<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'content-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('style'=>"width:800px; height:500px;")); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript" >
tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "modern",
    plugins : "fullpage,textcolor,autolink,lists,spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,directionality,fullscreen,noneditable,visualchars,nonbreaking,template,link,image,code",

    toolbar: "bold italic underline strikethrough alignleft aligncenter alignright alignjustify fontselect fontsizeselect cut copy paste bullist numlist outdent indent blockquote undo redo removeformat subscript superscript forecolor link unlink image code",


    paste_auto_cleanup_on_paste : false,
    // Skin options
    language : 'pl',

    // Example content CSS (should be your site CSS)
    content_css : "<?php echo Yii::app()->request->baseUrl; ?>/css/mce.css",

    width : "600",
    forced_root_block : false,


    font_formats : "Noto=Noto Sans",
    fontsize_formats: "13px 14px 16px",
    fullpage_default_font_size: "14px",
    fullpage_default_font_family: "Noto Sans"

});
</script>
