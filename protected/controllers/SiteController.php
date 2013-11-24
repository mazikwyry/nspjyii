<?php

class SiteController extends Controller
{
	public $loadJQuery=true;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$criteria = new CDbCriteria;
        $criteria->order = 'date_added DESC';
        $criteria->condition = "type='news' AND id>0";
        
		$dataProvider=new CActiveDataProvider(News::model(),array(         
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            
            )
            );
        
        
        $criteria = new CDbCriteria;
        $criteria->order = 'date_added DESC';
        
        $dataProviderRip=new CActiveDataProvider(Rip::model(),array(         
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            
            )
            );   

        $discussion = News::model()->findByPk(0); 
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
            'dataProviderRip'=>$dataProviderRip,
            'discussion'=>$discussion,

        ));
	}

	public function actionBlog()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		$criteria = new CDbCriteria;
        $criteria->order = 'date_added DESC';
        $criteria->condition = "type='blog'";
        
		$dataProvider=new CActiveDataProvider(News::model(),array(         
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            
            )
            );
            
        $this->render('blog',array(
            'dataProvider'=>$dataProvider

        ));
	}

	public function actionDyskusja()
	{
        $discussion = News::model()->findByPk(0); 

        $criteria = new CDbCriteria;
        $criteria->order = 'date_added DESC';
        $criteria->condition = "news_id=$discussion->id and visible=1";
        
        $comments=new CActiveDataProvider(Comments::model(),array(         
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>15,
                ),
            
            )
            );
        $this->render('dyskusja',array(
            'discussion'=>$discussion,
            'comments'=>$comments,


        ));
	}

		public function actionAdmin()
	{
            
        $this->render('admin');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Dziękujemy za kontakt. Odpowiemy tak szybko jak się da.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}