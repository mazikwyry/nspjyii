
    <?php if(Yii::app()->user->group==4 || Yii::app()->user->group==5){ ?>

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
                'items'=>Yii::app()->controller->menu,
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


    <?php } ?>

<div class="menu_block">
    <div class="menu_header">
        Parafia
    </div>
    <ul class="menu_items">
        <li><?php echo CHtml::link("Strona główna",Yii::app()->request->baseUrl); ?></li>
        <li><?php echo CHtml::link("Nabożeństwa",array('/site/page', 'view'=>'nabozenstwa')); ?></li>
        <li><a><?php echo CHtml::link("Kancelaria parafialna",array('/site/page', 'view'=>'sakramenty')); ?></a></li>
        <li><a><?php echo CHtml::link("Duszpasterze",array('/site/page', 'view'=>'duszpaterze')); ?></a></li>
        <li><a><?php echo CHtml::link("Ogłoszenia",Yii::app()->createUrl("content/view", array("id"=>2))); ?></a></li>
        <li><a><?php echo CHtml::link("Intencje mszalne",Yii::app()->createUrl("content/view", array("id"=>1))); ?></a></li>
        <li><a><?php echo CHtml::link("Wolne intencje",Yii::app()->createUrl("content/view", array("id"=>3))); ?></a></li>
        <li><?php echo CHtml::link("Gmina Wyry",array('/site/page', 'view'=>'polozenie')); ?></li>
        <li><a href="http://picasaweb.google.pl/parafia.wyry" target="_blank">Galeria</a></li>
         <li><a><?php echo CHtml::link("Kontakt",Yii::app()->createUrl('/site/contact')); ?></a></li> 
        <?php foreach ($page as $pager) {
          echo "<li style=\"font-weight:bold\">".CHtml::link($pager->title,Yii::app()->createUrl("content/view", array("id"=>$pager->id)))."</li>";  
        }
        ?>
    </ul>
</div>

<div class="menu_block">
    <div class="menu_header">
        Grupy Parafialne
    </div>
    <ul class="menu_items">
        <li><a href="http://www.nspj-wyry.katowice.opoka.org.pl/Pielgrzymki">Pielgrzymka</a></li>
        <li><?php echo CHtml::link("Ministranci",array('/site/page', 'view'=>'ministranci')); ?></li>
        <li><a href="http://www.nspj-wyry.katowice.opoka.org.pl/Oaza" target="_blank">Oaza</a></li>
        <li><?php echo CHtml::link("Formacja Studentów",array('/site/page', 'view'=>'studenci')); ?></li>
       <!--  <li><a><?php echo CHtml::link("Dzwoneczki",array('/site/page', 'view'=>'dzwoneczki')); ?></a></li>
        <li><a><?php echo CHtml::link("Dzieci Maryii",array('/site/page', 'view'=>'dzieci')); ?></a></li> -->
    </ul>
</div>

<div class="menu_block">
    <div class="menu_header">
        Historia
    </div>
    <ul class="menu_items">
        <li><a><?php echo CHtml::link("Skrót historii",array('/site/page', 'view'=>'skrot_historii')); ?></a></li>
        <li><a><?php echo CHtml::link("Kronika parafialna",array('/site/page', 'view'=>'kronika')); ?></a></li>
        <li><a><?php echo CHtml::link("Parish Chronicle [EN]", Yii::app()->request->baseUrl."/files/Kronika[EN].pdf"); ?></li>
        <li><a><?php echo CHtml::link("Chronik unserer Gemeinde [DE]", Yii::app()->request->baseUrl."/files/Kronika[DE].pdf"); ?></li>
    </ul>
</div>

<div class="menu_block">
    <div class="menu_header">
        Różne
    </div>
    <ul class="menu_items">
        <li><a><?php echo CHtml::link("Blog parafialny",Yii::app()->createUrl('/site/blog')); ?></a></li>        
        <li><a><?php echo CHtml::link("Dekanat",array('/site/page', "view"=>"dekanat")); ?></a></li> 
        <li><a><?php echo CHtml::link("Polecamy",array('/site/page', "view"=>"linki")); ?></a></li> 
        <!-- <li><a>Księga gości</a></li> -->
    </ul>
</div>