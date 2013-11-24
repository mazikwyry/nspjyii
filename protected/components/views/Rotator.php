
<div class="rotator_el">
 <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/4.jpg"); ?>
 <?php if ($xml==true && $day!=false){ ?>
 	<h1 style="background-color:rgba(255,255,255,0.7); color: #333; top:auto; bottom:20px; left:auto; right:-20px;">Dziś <?php echo $day; ?></h1>
 <?php }?>
</div>
<?php if ($xml==true){ ?>
 <div class="rotator_el">
    <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/bible.png"); ?>
 		<h1>Ewangelia dnia <?php echo $sigiel; ?></h1>
  	<div class='gospel'><?php echo $gospel; ?>  <a href='<?php echo $link; ?>' target='_blank' style='color:#b80000;'> czytaj więcej...</a></div>
 </div>
 <script type="text/javascript">
  var max = 2;
 </script>
<?php } else {?>
  
 <script type="text/javascript">
  var max = 1;
 </script>

<?php }?>
<!-- <div class="rotator_el">
 <a href="http://pielgrzymkawyry.pl" target="_blank">
  <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/pielgrzymka.png"); ?>
 </a>
</div> -->