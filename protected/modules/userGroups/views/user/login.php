<article><h1>Administracja - Logowanie</h1>
	<?php $this->breadcrumbs=array(
		'login',
		); ?>

	<?php
	if(isset($_GET['service']))
		if($_GET['service']=="herbert")
			$this->layout='//layouts/herbert';
		?>

		<div id="userGroups-container">
			<?php if(isset(Yii::app()->request->cookies['success'])): ?>
			<div class="info">
				<?php echo Yii::app()->request->cookies['success']->value; ?>
				<?php unset(Yii::app()->request->cookies['success']);?>
			</div>
		<?php endif; ?>
		<?php if(Yii::app()->user->hasFlash('success')):?>
		<div class="info">
			<?php echo Yii::app()->user->getFlash('success'); ?>
		</div>
	<?php endif; ?>
	<?php if(Yii::app()->user->hasFlash('mail')):?>
	<div class="info">
		<?php echo Yii::app()->user->getFlash('mail'); ?>
	</div>
<?php endif; ?>
<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableAjaxValidation'=>false,
		'focus'=>array($model, 'username'),
		)); ?>
		<p class="note"><?php echo Yii::t('userGroupsModule.general', 'Fields with {*} are required.', array('{*}' => '<span class="required">*</span>'))?></p>
		
		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		
		<div class="row checkbox">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
		<?php if (UserGroupsConfiguration::findRule('registration')): ?>
		<div class="row">
			<?php  if(isset($_GET['service']))
			echo CHtml::link(Yii::t('userGroupsModule.general', 'register'), array('/userGroups/user/register?service='.$_GET['service']));
			else
				echo CHtml::link(Yii::t('userGroupsModule.general', 'register'), array('/userGroups/user/register'));?>
		</div>
	<?php endif; ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
	
	<?php $this->endWidget(); ?>
</div><!-- form -->
</div></article>