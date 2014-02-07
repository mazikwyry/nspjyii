<div class="rotator_el">
 <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/4.jpg"); ?>
</div>
<?php if (false){ ?>
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

<script type="text/javascript">
	$(document).ready(function() {
		if ($(".p_dzis_obchodzimy").length <= 0){
	  		$("#day_desc").hide();
		}
	});
</script>