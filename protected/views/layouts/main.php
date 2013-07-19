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
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/tiny_mce/tinymce.min.js" ></script >
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <title>Parafia NSPJ Wyry</title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />   
        
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "ur-1ed39926-60b6-ae74-29e4-d0bbe41a5c4"}); </script>
        <?php if($this->loadJQuery==true){ ?>
            <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.js" ></script>
        <?php } ?>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/js.js" ></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-42588474-1', 'archidiecezja.katowice.pl');
          ga('send', 'pageview');

        </script>
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
                    <?php $this->widget('application.components.CounterWidget'); ?>
                </div>

                <div class="section" style="border:0;">
                    <h2>
                        Msze Święte
                    </h2>
                    <div class="floatleft">Pon.-So.</div>
                    <div class="floatright">7.00, 17.00</div>
                    <div class="cl"></div>
                    <div class="floatleft">Niedziela</div>
                    <div class="floatright">7.00, 9.00,<br/>11.00, 15.30</div>
                    <div class="cl"></div>
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
                    Wszelkie prawa zastrzeżone przez Parafię NSJP w Wyrach &copy; <?php echo date('Y'); ?>. Design and developed by <a href="http://cufal.pl/bs">studiomotylek</a>
                </div>
                
            </div>
        </footer>

    </body>

</html>