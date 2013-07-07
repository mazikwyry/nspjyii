<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Zarządzaj treścią', 'url'=>array('admin')),
);
?>

<h1>Nowa strona</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>