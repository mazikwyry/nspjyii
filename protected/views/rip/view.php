<?php
$this->breadcrumbs=array(
	'Rips'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Nowy pogrzeb', 'url'=>array('create')),
	array('label'=>'Uaktualnij pogrzeb', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Usuń pogrzeb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Zarządzaj pogrzebami', 'url'=>array('admin')),
);
?>

<h1>View Rip #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'who',
		'info',
		'date_added',
	),
)); ?>
