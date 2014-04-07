<?php
class RotatorWidget extends CWidget 
{
	public function run()
    {
		$adres = 'http://www.mateusz.pl/rss/czytania/';
		$xmlString = null;
		$ctx = stream_context_create(array('http'=>
	    array(
	        'timeout' => 3, // 1 200 Seconds = 20 Minutes
	    )
		));
		$rssHandle = @file_get_contents($adres, false, $ctx);
		//$rssHandle = @fopen($adres,"r") ; // Otwiera plik kanału RSS
		if($rssHandle) {
		  $x=true;
		  $xmlString .= $rssHandle;
		  set_error_handler(function($errno, $errstr, $errfile, $errline) {
        throw new Exception($errstr, $errno);
   	 	});
	  	try {
		  	$xmla = new SimpleXMLElement($xmlString);
			  $xml = $xmla->channel->item[0]->description;
			  $link = $xmla->channel->item[0]->link;
			  $txt = $xml;

			  $re1='/<p>\\((J|Mt|Mk|Łk)\\s\\d+\\,\\d+[^)]+\\).*?<\\/p>/';	# Any Sin
			  $re2 = '/\\((J|Mt|Mk|Łk)\\s\\d+\\,\\d+[^)]+\\)/';	
			  $re3 = '/^<p>[^-]*(?=<\\/p><p>\\()/';
			  if ($c=preg_match_all($re1, $txt, $matches)){
				     $xml = $matches[0][count($matches[0])-1];
				 	 $c2 = preg_match_all($re2, $xml, $matches);
				 	 $sigiel = $matches[0][0];
				 	 $day = "";
				 	 if($c3 = preg_match_all($re3, $txt, $matches)){
				 	 	$day = $matches[0][0];
				 	 	$day = str_replace("<p>", "", $day);
				 	 }else{
				 	 	$day = false;
				 	 }
				 	 $gospel = preg_replace($re2, "", $xml);
				 	 $gospel = shortenText($gospel,700, false);
				 	 preg_match("/^.+\\./", $gospel, $matches);
				 	 $gospel = $matches[0];


				 	 $xml = true;
			  }else{
			 		$xml = false;
			  }
		  }catch (Exception $e) {
				restore_error_handler();
				$xml = false;
			}
		}else{
			$xml = false;

		}
		if($xml)
			$this->render('Rotator',array('xml'=>$xml,'sigiel'=>$sigiel,'gospel'=>$gospel,'link'=>$link, 'day'=>$day));
    else
    	$this->render('Rotator',array('xml'=>$xml));
 	}
 }

 ?>