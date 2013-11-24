<?php $this->beginContent('//layouts/main'); ?>
    <div class="left">

        <div class="menu_block">
            <div class="menu_header">
               <?php echo CHtml::link(Yii::app()->user->name, array('/userGroups'), array("style"=>"color:white;")); ?>
            </div>
            <ul class="menu_items">
                <li><?php echo CHtml::link("Wyloguj", array('/userGroups/user/logout')); ?></li>
            </ul>
        </div>
         <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>"Operacje",
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
        ?>
        
        <div class="menu_block">
            <div class="menu_header">
                Administracja
            </div>
            <ul class="menu_items">
                <li><?php echo CHtml::link("Newsy", Yii::app()->createUrl("news/admin")); ?></li>
                <li><?php echo CHtml::link("Pogrzeby", Yii::app()->createUrl("rip/admin")); ?></li>
                <li><?php echo CHtml::link("Komentarze", Yii::app()->createUrl("comments/admin")); ?></li>
                <li><?php echo CHtml::link("Treści", Yii::app()->createUrl("content/admin")); ?></li>
            </ul>
        </div>

    </div>
    
    <div class="right">
        
        <article>
            <?php echo $content; ?>
        </article>
        
    </div>
<?php $this->endContent(); ?>