<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Newsy',
);

$this->menu=array(
	array('label'=>'Nowy news/wpis', 'url'=>array('create')),
	array('label'=>'Zarządzaj newsami', 'url'=>array('admin')),
);
?>

<h1>Aktualizacja newsa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>