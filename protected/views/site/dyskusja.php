<article style="margin-bottom:30px;">
    <div class="header">
      <div class="date">Dyskusja</div>
    </div>
    <div class="cl"></div>
    <div class="comments" style="padding:0px; width:100%; margin:20px 0 0 0;">

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
                    
                    <?php echo $form->hiddenField(Comments::Model(),'news_id',array('value'=>$discussion->id)); ?>
                    

                    <?php echo $form->textArea(Comments::Model(),'content',array('rows'=>6, 'cols'=>50, 'placeholder'=>"Twoja wypowiedź")); ?>
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
                    <?php echo CHtml::button('Dodaj wypowiedź',array('id'=>"yt0")); ?>
                </div>

            <?php $this->endWidget(); ?>
       </div>
	</div>	


</article>

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
