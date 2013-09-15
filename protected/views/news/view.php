<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<article>
    <div class="header">
      <div class="date"><?php echo substr($model->date_added, 8 ,2)."/".substr($model->date_added, 5 ,2)."/".substr($model->date_added, 0 ,4); ?></div>
      <?php echo $model->title; ?>
    </div>
    <div class="addthis_toolbox addthis_default_style ">
        <span class='st_facebook_large' displayText='Facebook'></span>
        <span class='st_twitter_large' displayText='Tweet'></span>
        <span class='st_linkedin_large' displayText='LinkedIn'></span>
        <span class='st_email_large' displayText='Email'></span>
    </div>
     <div class="cl"></div>
      <?php if(!empty($model->image)){ ?>
     <div class="image" id="medium">
         <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/images/medium/".$model->image, "Image"); ?>
     </div>
    <?php } ?>
     <?php echo stripslashes(nl2br($model->content)); ?>
     <div class="cl"></div>
</article>
<div class="comments">
    <div class="counter">Komentarze (<?php echo count($model->comments) ?>)</div>
    <div class="cl"></div>
    <div class="comments_list">
        <div id="list">
            <?php
                if($comments->itemCount>0){
                     $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$comments,
                        'itemView'=>'../comments/_view',
                        'summaryText'=>'',
                    ));
                } 
            ?>
        </div>

        <div class="one_comment add">
               <div class="errors" style="margin:5px 0; color:red;">
                   
               </div>
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'comments-form',
                'enableAjaxValidation'=>true,
                'action'=>'../comments/create',
            )); ?>
        
                <?php echo $form->errorSummary(Comments::Model()); ?>

                    <?php echo $form->textField(Comments::Model(),'author',array('size'=>60,'maxlength'=>100, 'placeholder'=>"Imię/Nick", 'style'=>"margin-right:10px;")); ?>
                    <?php echo $form->error(Comments::Model(),'author'); ?>
                    
                    <?php echo $form->hiddenField(Comments::Model(),'news_id',array('value'=>$model->id)); ?>
                    

                    <?php echo $form->textArea(Comments::Model(),'content',array('rows'=>6, 'cols'=>50, 'placeholder'=>"Twój komentarz")); ?>
                    <?php echo $form->error(Comments::Model(),'content'); ?>
                    
                    <div class="row captcha">
                        <?php echo $form->labelEx(Comments::Model(),'captcha'); ?>
                        <div>
                        <?php $this->widget('CCaptcha', array(
                            'clickableImage'=>true,
                            'imageOptions'=>array('id' => 'captcha_image'),
                            'showRefreshButton'=>false,
                        )); ?>
                        <?php echo $form->textField(Comments::Model(),'captcha'); ?>
                        <?php echo $form->error(Comments::Model(),'captcha'); ?>
                        </div>
                    </div>

                <div class="row buttons">
                    <?php echo CHtml::button('Napisz komentarz',array('id'=>"yt0")); ?>
                </div>

            <?php $this->endWidget(); ?>
        </div>
                                    
        
    </div>
</div>

<script type="text/javascript">
/*<![CDATA[*/
	jQuery(function($) {

		$('body').on('click', '#yt0', function() {
			jQuery.ajax({
				'type' : 'POST',
				'url' : '<?php echo Yii::app()->createUrl("comments/create"); ?>',
				'cache' : false,
				'data' : jQuery(this).parents("form").serialize(),
				'success' : function(html) {
				    if(html!="")
				        jQuery(".add").html("Komentarz dodany pomyślnie!<br/>Pojawi się na stronie po akceptacji moderatora strony.");
					else
					   jQuery(".errors").html("Uzupełnij wszystkie pola!");
					   jQuery.ajax({
                                url: "<?php echo Yii::app()->request->baseUrl; ?>\/comments\/captcha?refresh=1",
                                dataType: 'json',
                                cache: false,
                                success: function(data) {
                                jQuery('#captcha_image').attr('src', data['url']);
                                jQuery('body').data('captcha.hash', [data['hash1'], data['hash2']]);
                            }
                        });
                    
				}
			});
			return false;
		});

	}); 
/*]]>*/
    $(document).ready(function(){
        jQuery.ajax({
            url: "<?php echo Yii::app()->request->baseUrl; ?>\/comments\/captcha?refresh=1",
            dataType: 'json',
            cache: false,
            success: function(data) {
            jQuery('#captcha_image').attr('src', data['url']);
            jQuery('body').data('captcha.hash', [data['hash1'], data['hash2']]);
        }
    });
        
    });
	jQuery('#captcha_image').on('click',function(){
jQuery.ajax({
    url: "<?php echo Yii::app()->request->baseUrl; ?>\/comments\/captcha?refresh=1",
	dataType: 'json',
	cache: false,
	success: function(data) {
	jQuery('#captcha_image').attr('src', data['url']);
	jQuery('body').data('captcha.hash', [data['hash1'], data['hash2']]);
	}
	});
	return false;
	}); 
</script>



