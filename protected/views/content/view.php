<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->title,
);


$this->menu=array(
	array('label'=>'Zarządzaj treścią', 'url'=>array('admin')),
	array('label'=>'Edytuj stronę', 'url'=>array('update', 'id'=>$model->id)),
);
?>




<article>
    <h1><?php echo $model->title; ?></h1>
    <?php echo $model->content; ?>
</article>