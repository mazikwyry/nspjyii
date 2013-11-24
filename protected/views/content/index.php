<?php
$this->breadcrumbs=array(
	'Contents',
);

$this->menu=array(
	array('label'=>'Nowa strona', 'url'=>array('create')),
	array('label'=>'Zarządzaj treścią', 'url'=>array('admin')),
);
?>

<h1>Strony</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
