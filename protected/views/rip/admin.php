<?php
$this->breadcrumbs=array(
	'Rips'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Nowy pogrzeb', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rip-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pogrzeby</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rip-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'who',
		'info',
		'date_added',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
