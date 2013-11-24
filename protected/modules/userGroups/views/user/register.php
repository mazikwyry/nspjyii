<!--  Register to Herbert Page -->
<?php
$this->breadcrumbs=array(
	Yii::t('userGroupsModule.general','User Registration'),
);
?>

<?php
    echo $this->renderPartial('_register_user', array('model'=>$model, 'profiles'=>$profiles));    
?>
