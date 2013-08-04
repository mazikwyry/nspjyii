<?php
function shortenText($source_text, $word_count,$add_dots=true) 
{ 
    if(strlen($source_text)>=$word_count){
        $source_text = substr($source_text,0,$word_count);
        if($add_dots)
        	$source_text.="...";
        return $source_text;
    }else
    return $source_text; 
} 
?>