<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Nowa strona', 'url'=>array('create')),
	array('label'=>'Zarządzaj treścią', 'url'=>array('admin')),
);
?>

<h1>Aktualizacja treści</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>