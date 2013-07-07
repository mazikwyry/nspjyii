<?php
$this->breadcrumbs=array(
	'Rips'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Nowy pogrzeb', 'url'=>array('create')),
	array('label'=>'Zarządzaj pogrzebami', 'url'=>array('admin')),
);
?>

<h1>Uaktualnij pogrzeb <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>