
<?php 
if ($dataProviderRip->itemCount>0){
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProviderRip,
	    'itemView'=>'../rip/_view',
	    'summaryText'=>'',
	)); 
}
?>
<article style="margin-bottom:30px;">
    <div class="header">
      <div class="date">Ostatnie wypowiedzi w dyskusji</div>
    </div>
    <div class="cl"></div>
    <div class="comments" style="padding:0px; width:100%; margin:20px 0 0 0;">
        <?php 
        
            $ile = count($discussion->comments); 
            
            if($ile>0){
                echo'
                <div class="comments_list">';
                    $comments=new CArrayDataProvider(array_slice($discussion->comments,0,2));   
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$comments,
                        'itemView'=>'../comments/_view',
                        'summaryText'=>'',
                    ));
                     echo'<div class="one_comment">'; 
                        if($ile>2)
                            echo CHtml::link(CHtml::button('Zobaczy całą dyskusję', array('style'=>'float:left; cursor:pointer;')), array('site/dyskusja'));
                        echo CHtml::link(CHtml::button('Włącz się do dyskusji', array('style'=>'float:left; cursor:pointer;')), array('site/dyskusja'));
                    echo'</div>';
                echo'</div>';
            }else
            {
                echo'<div class="counter">'.CHtml::link("Brak wypowiedzi w dyskusji!", array('site/dyskusja')).'</div><div class="cl"></div>';   
            }
       ?>
	</div>	
</article>



<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'../news/_short_view',
    'summaryText'=>'',
)); 
?>
