<?php
function shortenText($source_text, $word_count) 
{ 
    if(strlen($source_text)>=$word_count){
        $source_text = substr($source_text,0,$word_count);
        $source_text.="...";
        return $source_text;
    }else
    return $source_text; 
} 
?>