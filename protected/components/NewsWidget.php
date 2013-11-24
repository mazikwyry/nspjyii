<?php
class NewsWidget extends CWidget 
{
	public function run()
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'date_added DESC';
        $criteria->condition = "type='news'";
		$news = News::model()->findAll($criteria);
		
		$this->render('NewsWidget',array('dataProvider'=>$news));
	}
	
}
?>

