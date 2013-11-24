<?php
class RotatorWidget extends CWidget 
{
	public function run()
    {
		$adres = 'http://www.mateusz.pl/rss/czytania/';
		$xmlString =null;
		if(@fopen($adres,"r")) { 
		  $rssHandle = fopen($adres,"r") ; // Otwiera plik kanału RSS
		  $x=true;
		  while (!feof($rssHandle)) {
		    if($x==true){
		    	$x = false;
		    	fgets($rssHandle);
		    }else
		    	$xmlString .= fgets($rssHandle);
		  }
		  $xmla = new SimpleXMLElement($xmlString);
		  //$xml =  $xmla->channel->title;
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
		  }else
		 	$xml = false;

		}else{
			$xml = false;
		}

		$this->render('Rotator',array('xml'=>$xml,'sigiel'=>$sigiel,'gospel'=>$gospel,'link'=>$link, 'day'=>$day));
 	}
 }

 ?>