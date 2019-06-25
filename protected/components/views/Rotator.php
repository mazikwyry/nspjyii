<!--  <div class="rotator_el">
  <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/zyczeniawn.png"); ?>
</div> -->
<div class="rotator_el">
  <a href="http://pielgrzymkawyry.pl">
    <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/pielgrzymka2019.jpg"); ?>
  </a>
</div>
<div class="rotator_el">
 <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/photos/4.jpg"); ?>
	 <h1 id="day_desc" style="background-color:rgba(255,255,255,0.7); color: #333; top:auto; bottom:20px; left:auto; right:-20px; font-size:18px; padding:10px;">
		<strong style="font-size:24px;">Dziś obchodzimy:</strong><? readfile('http://www.edycja.pl/ext/dzien.php'); ?>
		<style>
			.www_edycja_pl>*{
				display: none;
			}
			.www_edycja_pl>.p_dzis_obchodzimy{
				display: inline;
			}
		</style>
	</h1>
</div>
<?php if ($xml){ ?>
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


<script type="text/javascript">
	$(document).ready(function() {
		if ($(".p_dzis_obchodzimy").length <= 0){
	  		$("#day_desc").hide();
		}
	});
</script>
