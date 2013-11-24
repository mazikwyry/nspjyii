<?php

class HImagesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'userGroupsAccessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','reorder','getorder'),
				'users'=>array('@'),
				'groups'=>array('admin', 'hubert'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'groups'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * Get number of images in category
	 * @param integer $cat_id - category id
	 */
	public function actionGetorder($cat_id)
	{
		$model = HImages::model()->count("cat_id=".$cat_id);
	    echo $model;
	    Yii::app()->end();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new HImages;
		$data = HCategories::getDropDownListData();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HImages']))
		{
			$model->attributes=$_POST['HImages'];
			$model->attributes=$_POST['HImages'];
			$model->ORDER = $_POST['HImages']['ORDER'];
			if($file = CUploadedFile::getInstance($model,'new_path'))
				{
					if($model->validate()){
						$extName = $file->getExtensionName();
						if($extName=='jpeg')
							$extName = 'jpg';
						$fileName=md5(date('Y-m-d H:i:s')).".".$extName;
						$srcFileBig = "images/himages/big/".$fileName ;
						$srcFileMedium = "images/himages/medium/".$fileName ;
						$srcFileSmall = "images/himages/small/".$fileName ;
						$model->new_path=$fileName;
						
						$image = WideImage::loadFromFile($_FILES['HImages']['tmp_name']['new_path']);
						if($image->getWidth()>$image->getHeight())
							$resized = $image->resize(500, null);
						else
							$resized = $image->resize(null, 500);
						$resized->saveToFile($srcFileBig);	
	
						$resized = $image->resize(300, null)->crop("center", "middle", 100, 100);
						$resized->saveToFile($srcFileSmall);	
						
						$resized = $image->resize(400, null)->crop("center", "middle", 240, 240);
						$resized->saveToFile($srcFileMedium);
						
						$model->path = $model->new_path;
						
						$model->shiftOrder();
						
						if($model->save())
						{
							
							//adding to rotator
							if($model->rotator==1)
							{
								$rotator = new Rotator;
								$rotator->img_id = $model->id;
								$rotator->order = $_POST['Rotator']['order'];
								$rotator->shiftOrder();
								if($rotator->save())
									Yii::app()->user->setFlash('success', "Image added to rotator.");
							}
							
							Yii::app()->user->setFlash('success', "Image was succesfully added!");
							$this->redirect(array('view','id'=>$model->id));
						}
					}
				}
				else{
					Yii::app()->user->setFlash('error', "There's a problem with upload!");	
				}
		}

		$this->render('create',array(
			'model'=>$model,
			'data'=>$data,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$data = HCategories::getDropDownListData();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HImages']))
		{
			$model->attributes=$_POST['HImages'];
			$model->ORDER = $_POST['HImages']['ORDER'];
			if($file = CUploadedFile::getInstance($model,'new_path'))
			{
				if($model->validate()){
					$extName = $file->getExtensionName();
					if($extName=='jpeg')
						$extName = 'jpg';
					$fileName=md5(date('Y-m-d H:i:s')).".".$extName;
					$srcFileBig = "images/himages/big/".$fileName ;
					$srcFileMedium = "images/himages/medium/".$fileName ;
					$srcFileSmall = "images/himages/small/".$fileName ;
					$model->new_path=$fileName;
					
					$image = WideImage::loadFromFile($_FILES['HImages']['tmp_name']['new_path']);
					if($image->getWidth()>$image->getHeight())
						$resized = $image->resize(800, null);
					else
						$resized = $image->resize(null, 600);
					$resized->saveToFile($srcFileBig);	
	
					$resized = $image->resize(300, null)->crop("center", "middle", 100, 100);
					$resized->saveToFile($srcFileSmall);	
					
					$resized = $image->resize(400, null)->crop("center", "middle", 240, 240);
					$resized->saveToFile($srcFileMedium);
					
					unlink("images/himages/big/".$model->path);
					unlink("images/himages/medium/".$model->path);
					unlink("images/himages/small/".$model->path);
					
					$model->path = $model->new_path;
					
				}
			}
			$model->shiftOrder(); 
			//changing in rotator

			$model_old=$this->loadModel($id);
			//if was in rotator
			if($model_old->rotator==1)
			{
				$rotator = Rotator::model()->find("img_id=".$model->id);
				//if still in rotator - change order
				if($model->rotator==1)
				{
					$rotator->order = $_POST['Rotator']['order'];
					$rotator->shiftOrder();
					if($rotator->update())
						Yii::app()->user->setFlash('success', "Order changed!");
				}
				//delete from rotator
				else {
					$rotator->shiftOrder(true);
					if($rotator->delete())
						Yii::app()->user->setFlash('success', "Delete from rotator!");	
				}
			}
			else {
				//if wasn't in rotator but will be
				if($model->rotator==1){
					$rotator = new Rotator;
					$rotator->img_id = $model->id;
					$rotator->order = $_POST['Rotator']['order'];
					$rotator->shiftOrder();
					if($rotator->save())
						Yii::app()->user->setFlash('success', "Image added to rotator.");
				}
			}
			
			
			
			if($model->save())
			{
				//Yii::app()->user->setFlash('success', "Image was succesfully updated!");
				$this->redirect(array('view','id'=>$model->id));
			}
			
		}

		$this->render('update',array(
			'model'=>$model,
			'data'=>$data,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			
			
			//kick out from rotator
			/*
			if($model->rotator==1)
			{
				$rotator = Rotator::model()->find("img_id=".$model->id);
				$rotator->shiftOrder(true);
				$rotator->delete();
			}
			*/
			$model->shiftOrder(true);
			unlink("images/himages/big/".$model->path);
			unlink("images/himages/medium/".$model->path);
			unlink("images/himages/small/".$model->path);
			if($model->delete())
				Yii::app()->user->setFlash('success', "Image was succesfully deleted!");
				
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			$this->redirect(array('admin?cate_id='.$model->cat_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Reorder(up/down)
	 */
	public function actionReorder($id, $dir, $cat_id)
	{
		$model = HImages::model()->find('`order`='.$id.' and cat_id='.$cat_id);
		if($dir=="up"){
			$model -> ORDER-=1;
			$model -> shiftOrder();
		}else {
			$model -> ORDER+=1;
			$model -> shiftOrder();
		}
		$model -> update();
		
		$this->redirect(array('admin?cate_id='.$model->cat_id.'#'.($model->ORDER-1)));
	}

	/**
	 * Manages all models.
	 */
	
	public function actionAdmin()
	{
		//MAKE AN NEW ORDER
		//$model=new HImages();
		//$model->makeOrder();
		
		$data = HCategories::getDropDownListData();
		
		$model=new HImages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_POST['HImages']))
			$model->attributes=$_POST['HImages'];
		else
			if(isset($_GET['cate_id']))
				$model->cat_id=$_GET['cate_id'];
			else
				$model->cat_id=1;

		$this->render('admin',array(
			'model'=>$model,
			'data'=>$data,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=HImages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='himages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
