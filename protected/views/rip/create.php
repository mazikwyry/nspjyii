<?php
$this->breadcrumbs=array(
	'Rips'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Zarządzaj pogrzebami', 'url'=>array('admin')),
);
?>

<h1>Nowy pogrzeb</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>