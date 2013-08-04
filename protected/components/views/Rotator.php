
<div class="rotator_el">
 <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/4.jpg"); ?>
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