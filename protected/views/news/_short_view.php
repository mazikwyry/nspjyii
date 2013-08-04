<article>
    <div class="header">
      <div class="date"><?php echo substr($data->date_added, 8 ,2)."/".substr($data->date_added, 5 ,2)."/".substr($data->date_added, 0 ,4); ?></div>
      <?php echo CHtml::link($data->title, array('news/view', 'id'=>$data->id)); ?>
    </div>
    <div class="addthis_toolbox addthis_default_style ">
        <span class='st_facebook_large' displayText='Facebook'></span>
        <span class='st_twitter_large' displayText='Tweet'></span>
        <span class='st_linkedin_large' displayText='LinkedIn'></span>
        <span class='st_email_large' displayText='Email'></span>
    </div>
     <div class="cl"></div>
      <?php if(!empty($data->image)){ ?>
     <div class="image">
         <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/images/small/".$data->image, "Image"); ?>
     </div>
    <?php } ?>
     <?php echo stripslashes(nl2br(shortenText($data->content,800))); ?>
</article>
<div class="comments">
        <?php 
        
            $ile = count($data->comments); 
            
            if($ile>0){
                echo'
                <div class="counter">Komentarze ('.$ile.')</div>
                <div class="cl"></div>
                <div class="comments_list" style="display: none;">';
                    $comments=new CArrayDataProvider($data->comments);   
                    $comments->setTotalItemCount(2);
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$comments,
                        'itemView'=>'../comments/_view',
                        'summaryText'=>'',
                    ));
                     echo'<div class="one_comment">'; 
                        if($ile>10)
                            echo CHtml::link(CHtml::button('Więcej komentarzy...', array('style'=>'float:left; cursor:pointer;')), array('news/view', 'id'=>$data->id));
                        echo CHtml::link(CHtml::button('Dodaj komentarz', array('style'=>'float:left; cursor:pointer;')), array('news/view', 'id'=>$data->id));
                    echo'</div>';
                echo'</div>';
            }else
            {
                echo'<div class="counter">'.CHtml::link("Brak komentarzy. Bądź pierwszy!", array('news/view', 'id'=>$data->id)).'</div><div class="cl"></div>';   
            }
       ?>
</div>
