<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Noto+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lazyYT.css" />
        <?php if($this->loadJQuery==true){ ?>
            <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.js" ></script>
        <?php } ?>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/lazyYT.js" ></script>
        <script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/js.js" ></script>
        <!-- nanogallery2 -->
        <link  href="https://unpkg.com/nanogallery2@2.4.2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
        <script  type="text/javascript" src="https://unpkg.com/nanogallery2@2.4.2/dist/jquery.nanogallery2.min.js"></script>
    </head>
    <body>

                <header>
                    <div class="title">
                        <div class="div960">
                            <div style="float:left; letter-spacing: 0px;">
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
                            <span class="no-mobile"><?php echo CHtml::link("galeria",Yii::app()->createUrl("site/gallery")); ?></span>
                            <span class="no-mobile"><?php echo CHtml::link("kontakt",Yii::app()->createUrl('/site/contact')); ?></span>
                        </div>
                    </nav>
                    <div class="div960 logo" style="height:289px;">
                        <div class="mobile_menu" id="hamburger">
                            <div class="mobile_menu_button-hamburger" id="hamburger_icon"></div>
                        </div>
                        <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/images/gfx/logo.png","logo",array('id'=>'logo_img')),Yii::app()->request->baseUrl."/") ; ?>
                        <span class="title_mobile">NSPJ Wyry</span>
                    </div>

                </header>
                       <div class="content_all">
                <div class="div960">
                    <div class="rotator">
                        <div class="rotator_inside">
                            <div class="rotator_wrapper">
                              <?php $this->widget('application.components.RotatorWidget'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo $content; ?>

                    <div class="cl"></div>
                </div>


        </div>
        <footer>
            <div class="div960">

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


                  <div class="section right_sec">
                    <h2>
                        Kontakt
                    </h2>

                    ul. Ks. Franciszka Bojdoła 3, <br/>
                    43-175 Wyry<br/>
                    tel: 32 218 71 88<br/>
                </div>

                <div class="cl"></div>
                <div class="copyright">
                    Wszelkie prawa zastrzeżone przez Parafię NSJP w Wyrach &copy; <?php echo date('Y'); ?>. Design and developed by <a href="http://cufal.pl/bs">studiomotylek</a><br/>
                    Nieniejsza strona internetowa używa plików cookies. Korzystanie z niej oznacza, że będą one umieszczane w Twoim urządzeniu końcowym. <br/> Jeżeli się na to nie zgadzasz opuść stronę lub zmień ustawienia dotyczące plików cookies w swojej przeglądarce.
                </div>

            </div>
        </footer>

    </body>

</html>
