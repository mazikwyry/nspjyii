<article>
    <div class="header">
      <div class="date"><?php echo substr($data->date_added, 8 ,2)."/".substr($data->date_added, 5 ,2)."/".substr($data->date_added, 0 ,4); ?></div>
      <?php echo $data->title; ?>
    </div>
    <div class="addthis_toolbox addthis_default_style ">
        <span class='st_facebook_large' displayText='Facebook'></span>
        <span class='st_twitter_large' displayText='Tweet'></span>
        <span class='st_linkedin_large' displayText='LinkedIn'></span>
        <span class='st_email_large' displayText='Email'></span>
    </div>
     <div class="cl"></div>
     <div class="image">
         <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/images/small/".$data->image, "Image"); ?>
     </div>
     <?php echo stripslashes($data->content); ?>
</article>
<div class="comments">
    <div class="counter">Komentarze (10)</div>
    <div class="cl"></div>
    <div class="comments_list" style="display: none;">
        <div class="one_comment">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis neque nec metus aliquam rhoncus. Aliquam nunc urna, porttitor convallis ultricies et, tincidunt in urna.
            <br/>
            <span class="author_date">Anna, 29/12/2012</span>
        </div>
        <div class="one_comment">
            Lorem ipsum dolor sit amet, rhoncus. Aliquam nunc urna, porttitor convallis ultricies et, tincidunt in urna.
            <br/>
            <span class="author_date">Anna, 29/12/2012</span>
        </div>
        <div class="one_comment">
             Donec quis neque nec metus aliquam rhoncus. Aliquam nunc urna, porttitor convallis ultricies et, tincidunt in urna.
            <br/>
            <span class="author_date">Anna, 29/12/2012</span>
        </div>
        <div class="one_comment">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis neque nec metus aliquam rhoncus. Aliquam nunc urna, porttitor convallis ultricies et, tincidunt in urna. Morbi at mauris urna, at laoreet lorem. In in bibendum enim. Nullam lacinia arcu at dolor pellentesque in ornare odio lobortis.
            <br/>
            <span class="author_date">Anna, 29/12/2012</span>
        </div>
        <div class="one_comment add">
            <input type="text" style="margin-right: 10px;" placeholder="Imię lub nick"/>
            <input type="text" placeholder="E-mail"/>
            <textarea placeholder="Twój komentarz"></textarea>
            <input type="submit" value="Napisz komentarz" />
        </div>
                                    
        
    </div>
</div>
