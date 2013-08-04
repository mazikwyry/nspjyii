<article class="rip">
    <div class="header">
      <div class="date"><?php echo substr($data->date_added, 8 ,2)."/".substr($data->date_added, 5 ,2)."/".substr($data->date_added, 0 ,4); ?></div>
      Zmarł
      

      <?php
      $baba=false;
        if(strpos($data->who," ")){
            $letters = str_split($data->who);
            if($letters[strpos($data->who," ")-1]=="a")
                {
                    echo $letters[strpos($data->who," ")];
                    echo "a";
                    $baba=true;
                }
        }

      ?>
      
     <?php echo $data->who; ?>
    </div>
    <div class="cl"></div>
    <div class="image">
        <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/gfx/rip.png", "Klepsydra"); ?>
    </div>
    <?php echo nl2br($data->info); ?>
    <br/><br/>
    <i>Wieczny odpoczynek racz <?php echo $baba ? "jej" : "mu"; ?> dać Panie, a światłość wiekuista niechaj <?php echo $baba ? "jej" : "mu"; ?> świeci. Niech odpoczywa w pokoju wiecznym. Amen.</i> 
</article>