<?php
class Menu extends CWidget 
{
    public function run()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "id>3";
        $page = Content::model()->findAll($criteria);
        
        $this->render('Menu',array('page'=>$page));
    }
    
}
?>

        
        