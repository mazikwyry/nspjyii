
<?php 
if ($dataProviderRip->itemCount>0){
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProviderRip,
	    'itemView'=>'../rip/_view',
	    'summaryText'=>'',
	)); 
}
?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'../news/_short_view',
    'summaryText'=>'',
)); 


echo $xml;
?>
