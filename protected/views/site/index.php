<?php $this->pageTitle = "Strona główna" ?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProviderRip,
    'itemView'=>'../rip/_view',
    'summaryText'=>'',
)); ?>


<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'../news/_short_view',
    'summaryText'=>'',
)); ?>
