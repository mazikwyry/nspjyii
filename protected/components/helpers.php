<?php
function shortenText($source_text, $word_count,$add_dots=true, $id=0) 
{ 
    if(strlen($source_text)>=$word_count){
        $source_text = substr($source_text,0,$word_count);
        if($add_dots)
        	if($id>0)
        		$source_text.="... ".CHtml::link("czytaj dalej", array('news/view', 'id'=>$id));
        	else
        		$source_text.="...";
        return $source_text;
    }else
    return $source_text; 
} 
?>