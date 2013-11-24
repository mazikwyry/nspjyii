<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';
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
				'actions'=>array('index','view', 'captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'groups'=>array(5,'admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'groups'=>array(5,'admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    public function actions()
    {
        return array(
        // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $this->layout = "empty";
	    $this->loadJQuery=false;
        $model = $this->loadModel($id);
        $criteria = new CDbCriteria;
        $criteria->order = 'date_added DESC';
        $criteria->condition = "news_id=$model->id and visible=1";
        
        $comments=new CActiveDataProvider(Comments::model(),array(         
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            
            )
            );
        
		$this->render('view',array(
			'model'=>$model,
			'comments'=>$comments
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];

                if($model->validate()){
                  	if($file = CUploadedFile::getInstance($model,'image'))
                	{
                        $extName = $file->getExtensionName();
                        if($extName=='jpeg')
                            $extName = 'jpg';
                        $fileName=md5(date('Y-m-d H:i:s')).".".$extName;
                        $srcFileBig = "images/images/big/".$fileName ;
                        $srcFileMedium = "images/images/medium/".$fileName ;
                        $srcFileSmall = "images/images/small/".$fileName ;
                        $model->image = $fileName;
                        
                        $image = WideImage::loadFromFile($_FILES['News']['tmp_name']['image']);
                        if($image->getWidth()>$image->getHeight())
                            $resized = $image->resize(500, null);
                        else
                            $resized = $image->resize(null, 500);
                        $resized->saveToFile($srcFileBig);  
    
                        $resized = $image->resize(300, null)->crop("center", "middle", 100, 100);
                        $resized->saveToFile($srcFileSmall);    
                        
                        $resized = $image->resize(300, null)->crop("center", "middle", 240, 240);
                        $resized->saveToFile($srcFileMedium);
                    }
        			if($model->save())
        				$this->redirect(array('admin'));
                }          

		}


		$this->render('create',array(
			'model'=>$model,
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
        $old_model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
		    $model->attributes=$_POST['News'];
			
			if($file = CUploadedFile::getInstance($model,'image'))
            {
                $test = $file->getName();
                if($model->validate()){
                    
                    $extName = $file->getExtensionName();
                    if($extName=='jpeg')
                        $extName = 'jpg';
                    $fileName=md5(date('Y-m-d H:i:s')).".".$extName;
                    $srcFileBig = "images/images/big/".$fileName ;
                    $srcFileMedium = "images/images/medium/".$fileName ;
                    $srcFileSmall = "images/images/small/".$fileName ;
                    
                    
                    $image = WideImage::loadFromFile($_FILES['News']['tmp_name']['image']);
                    if($image->getWidth()>$image->getHeight())
                        $resized = $image->resize(500, null);
                    else
                        $resized = $image->resize(null, 500);
                    $resized->saveToFile($srcFileBig);  
    
                    $resized = $image->resize(300, null)->crop("center", "middle", 100, 100);
                    $resized->saveToFile($srcFileSmall);    
                    
                    $resized = $image->resize(400, null)->crop("center", "middle", 240, 240);
                    $resized->saveToFile($srcFileMedium);
                    
                    unlink("images/images/big/".$model->image);
                    unlink("images/images/medium/".$model->image);
                    unlink("images/images/small/".$model->image);
                    
                    $model->image = $fileName;
                    
                }
            }else
                $model->image = $old_model->image;

			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
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
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	    $this->layout = "empty";
		$dataProvider=new CActiveDataProvider('News',array(         
		    
    		    'pagination'=>array(
                    'pageSize'=>10,
                ),
            
            )
            );
		$this->render('index',array(
			'dataProvider'=>$dataProvider,

		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];
    	$this->loadJQuery=false;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
