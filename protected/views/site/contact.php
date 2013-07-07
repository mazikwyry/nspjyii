<?php
$this->pageTitle=Yii::app()->name . ' - Kontakt';
$this->breadcrumbs=array(
	'Contact',
);
?>
<article>
<h1>Kontakt</h1>



<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<div class="form" style="width:50%; float:right;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('style'=>"width:90%;")); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('style'=>"width:90%;")); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('style'=>"width:90%; height:50px;")); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row captcha">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha', array(
                            'clickableImage'=>false,
                        )); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
	<div class="cl"></div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Wyślij'); ?>
	</div>
	<div class="cl"></div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div style="width:45%; text-align:left;">
	<br/>
	<strong style="color:#B80000;">Parafia Rzymsko-Katolicka pw. Najświętszego Serca Pana Jezusa w Wyrach</strong></br>
	ul. Ks. Franciszka Bojdoła 3, <br/>
	43-175 Wyry<br/>
	tel: 032 218 71 88<br/>
	wyry [at] archidiecezja.katowice.pl
	<br/><br/>
	Bank Spółdzielczy w Tychach:<br>
	61 8435 0004 0000 0000 4633 0001 
     <br/>
</div>
<div class="cl"></div>
<?php endif; ?>
</article>