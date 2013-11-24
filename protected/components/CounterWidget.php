<?php
class CounterWidget extends CWidget 
{
    public function run()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = "id=1";
        $criteria->limit = 1;
        $counter = Counter::model()->find($criteria);

		if (!isset($_COOKIE["nspj_counter"])){
		  $counter->d = $counter->d+1;
		  $counter->y = $counter->y+1;
		  $counter->o = $counter->o+1;
		  $counter->save();
		  setcookie("nspj_counter", "visited", time()+3600);
		}

        $this->render('Counter',array('counter'=>$counter));


    }
    
}
?>

        