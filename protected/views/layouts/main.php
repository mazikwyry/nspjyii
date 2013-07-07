<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/tiny_mce/tiny_mce.js" ></script >
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />   
        
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "ur-1ed39926-60b6-ae74-29e4-d0bbe41a5c4"}); </script>
        <?php if($this->loadJQuery==true){ ?>
            <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.js" ></script>
        <?php } ?>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/js.js" ></script>
    
    </head>
    <body>
        <div class="content_all">
                <header>
                    <div class="title">
                        <div class="div960">
                            <div style="float:left; letter-spacing: 1px;">
                            Parafia Najświętszego Serca
                            </div>
                            <div style="float:right; letter-spacing: 4px;">
                               Pana Jezusa w Wyrach 
                            </div>
                        </div>
                    </div>
                    <nav class="top">
                        <div class="div960 moved" id="menu_top">
                            <?php echo CHtml::link("ogłoszenia",Yii::app()->createUrl("content/view", array("id"=>2))); ?>
                            <?php echo CHtml::link("intencje",Yii::app()->createUrl("content/view", array("id"=>1))); ?>
                            <div class="pause"></div>
                            <a href="http://picasaweb.google.pl/parafia.wyry" target="_blank">galeria</a>
                            <?php echo CHtml::link("kontakt",Yii::app()->createUrl('/site/contact')); ?>
                        </div>
                    </nav>
                    <div class="div960" style="height:289px;">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/images/gfx/logo.png","logo",array('id'=>'logo_img')),Yii::app()->request->baseUrl) ; ?>
                    </div>

                </header>
                
                <div class="div960">
                    <div class="rotator">
                        <div class="rotator_el">
                          <?php $this->rotator($this->rotator_image) ?>
                        </div>
                    </div>
                    
                    <?php echo $content; ?>
                    
                    <div class="cl"></div>
                </div>
                
            
        </div>
        <footer>
            <div class="div960">
                <div class="section">
                    <h2>
                        Statystyki
                    </h2>
                    <div class="floatleft">Dzisiaj</div>
                    <div class="floatright">126</div>
                    <div class="cl"></div>
                    <div class="floatleft">W tym tygodniu</div>
                    <div class="floatright">1022</div>
                    <div class="cl"></div>
                    <div class="floatleft">Od 2000r.</div>
                    <div class="floatright">46658</div>
                    <div class="cl"></div>
                </div>
                
                <div class="section" style="border:0;">
                    <h2>
                        Zagłosuj na nas
                    </h2>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/gfx/top100.png"); ?>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl."/images/gfx/top100k.png"); ?>
                </div>
                
                  <div class="section" style="float:right; width:300px; height:auto; padding:0px;border:0; margin-right: 0px; text-align: right;">
                    <h2>
                        Kontakt
                    </h2>

                    ul. Ks. Franciszka Bojdoła 3, <br/>
                    43-175 Wyry<br/>
                    tel: 032 218 71 88<br/>
                </div>
                
                <div class="cl"></div>
                <div class="copyright">
                    Wszelkie prawa zastrzeżone przez Parafię NSJP w Wyrach 2012. Design and developed by <a href="http://studiomotylek.pl"><img src="../images/gfx/bfs.png" id="bfs" style="top:28px; position: relative;" /></a>
                </div>
                
            </div>
        </footer>

    </body>

</html>