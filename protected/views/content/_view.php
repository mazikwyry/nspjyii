<div class="view">

	<strong><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</strong>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<strong><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</strong>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<strong><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</strong>
	<?php echo CHtml::encode($data->content); ?>
	<br />


</div>