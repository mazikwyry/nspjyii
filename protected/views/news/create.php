<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Newsy',
);

$this->menu=array(
	array('label'=>'Zarządzaj newsami', 'url'=>array('admin')),
);
?>

<h1>Create News</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>