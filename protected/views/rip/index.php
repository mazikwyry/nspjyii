<?php
$this->breadcrumbs=array(
	'Rips',
);

$this->menu=array(
	array('label'=>'Nowy pogrzeb', 'url'=>array('create')),
	array('label'=>'Zarządzaj pogrzebami', 'url'=>array('admin')),
);
?>

<h1>Pogrzeby</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
