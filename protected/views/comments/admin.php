<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('comments-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Komentarze</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comments-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'news.title',
		'author',
		'content',
		'date_added',
		array(
                'type' => 'raw',
                'value' => '$data->visible==0 ? CHtml::link("Akceptuj","", array(
                    "onClick"=>CHtml::ajax(array
                        (
                                "url"=>Yii::app()->createUrl("comments/accept", array("id" => $data->id)),
                                "success"=>"function(data){
                                	alert(\'Zaakceptowano\');
                                    $.fn.yiiGridView.update(\'comments-grid\');

                                    
                                }",
                        ) 
                    ),
                    "style"=>"color:green; cursor:pointer;",
                ) 
            ): "Zaakceptowano";'
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 

                
                //CHtml::ajaxLink(
                //    "Akceptuj",
                //    Yii::app()->createUrl("comments/accept", array("id" => $data->id)),
                //    array("success"=>"function(data){alert(\'Zaakceptowano komentarz.\'); $(\'#com".$data->id."\').hide();}"), array("id"=>"com".$data->id)
                //) 

?>
