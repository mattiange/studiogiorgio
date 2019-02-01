<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Utenti;

$utenti = new Utenti();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
<?php $this->beginBody() ?>
<div class="page-wrapper">
    <?php if(!Yii::$app->user->isGuest) : ?>
    <div id="topmenu">
        <div class="title"><?= Yii::t('app', 'Amministra') ?>: </div>
        <div class="">
            <a href="<?= Url::to(['slideshow/slideshow']) ?>"><?= Yii::t('app', 'Slideshow'); ?></a>
        </div>
        <div class="">
            <a href="<?= Url::to(['categorie/index']) ?>"><?= Yii::t('app', 'Servizi'); ?></a>
        </div>
        <div class="">
            <?php
            echo Html::beginForm(['/site/l'], 'post');
            echo Html::submitButton(
                Yii::t('app', 'Esci'),
                ['class' => 'btn btn-link logout']
            );
            echo Html::endForm();
            ?>
        </div>
    </div>
    <?php endif; ?>
    
    <header id="header">
        <!-- Navigation bar -->
        <div class="navbar navbar-default navbar-fixed-top nav-container">
            <div class="auto-box">
                <div class="navbar-header">		
                    <!-- Responsive Menu Button -->
                    <button type="button" id="nav-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>

                    <!-- Logo Image -->
                    <a class="navbar-brand" rel="canonical" href="<?= Url::home(); ?>">
                        <img class="img-responsive"  src="<?= Yii::getAlias('@web'); ?>/images/ico/Studio-Giorgio.jpg" alt="" />
                    </a>

                </div>
                <!-- End Navigation bar -->
                <!-- Navigation Menu -->
                <nav id="navigation-menu" class="main-menu collapse navbar-collapse" role="navigation" style="height: 1px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="<?= Url::home() ?>">Home</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="<?= Url::to(['site/categorie']) ?>"><?= Yii::t('app', 'I nostri servizi') ?></a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="<?= Url::to(['site/fidelity_card']) ?>"><?= Yii::t('app', 'Fidelity Card') ?></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Navigation Menu -->
            </div>
        </div>
    </header>
    
    <section id="content">
        <?= $content ?>
    </section>
    
    <footer class="main-footer">
        <!-- upper -->
        <div class="upper anim-3-all">
            <div class="auto-box">
                <div class="row clearfix slideUp">
                    <article class="col-lg-4 col-md-3 col-sm-6 col-xs-12 animation fadeInUp">
                        <h2 class="border-line-left">Amministrazione</h2>
                        <div class="textwidget">
                            <div class="text ">
                                <ul>
                                <?php if(Yii::$app->user->isGuest) : ?>
                                    <li><a href="<?= Url::to(['site/login']) ?>">Accedi</a></li>
                                <?php else : ?>
                                    <li><a href="<?= Url::to(['admin/index']) ?>"><?= Yii::t("app", "Amministrazione") ?></a></li>
                                    <li>
                                        <a href="<?= Url::to(['site/l']) ?>"><?= Yii::t("app", "Disconnettiti") ?></a>
                                    </li>
                                <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-3 col-sm-6 col-xs-12 animation fadeInUp">
                        <h2 class="border-line-left">Seguici su facebook</h2>
                        <div class="textwidget">
                            <div class="text ">
                                <?= \app\models\Facebook::getFacebookPage(); ?>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-3 col-sm-6 col-xs-12 animation fadeInUp">
                        <div class="widget cont-info">
                            <h2 class="border-line-left">Contattaci</h2>
                            <ul>
                                <?php foreach(\app\models\Contatti::getContacts() as $contact) {
                                    echo "<li data-delay='100' data-animation='fadeInUp' class='animated fadeIn in";
                                    switch($contact['callToAction']){
                                        case 'phone':
                                            echo " phone'>";
                                            echo "<i class='fa fa-{$contact['icona']} margin-0-10-0-0' aria-hidden='true'></i>";
                                            echo "<a href='tel:{$contact['voce']}'>{$contact['voce']}</a>";
                                            break;
                                        case 'email':
                                            echo " mail>";
                                            echo "<i class='fa fa-{$contact['icona']} margin-0-10-0-0' aria-hidden='true'></i>";
                                            echo "<a href='mailto:{$contact['voce']}'>{$contact['voce']}</a>";
                                            break;
                                        case 'skype':
                                            echo " skype>";
                                            echo "<i class='fa fa-{$contact['icona']} margin-0-10-0-0' aria-hidden='true'></i>";
                                            echo "<a href='skype:{$contact['voce']}?call'>{$contact['voce']}</a>";
                                            break;
                                        case 'site':
                                            echo " website>";
                                            echo "<i class='fa fa-{$contact['icona']} margin-0-10-0-0' aria-hidden='true'></i>";
                                            echo "<a href='{$contact['voce']}' target='_blank'>{$contact['voce']}</a>";
                                            break;
                                        default:
                                            echo "'>";
                                            echo "<i class='fa fa-{$contact['icona']} margin-0-10-0-0' aria-hidden='true'></i>";
                                            echo $contact['voce'];
                                            break;
                                    }
                                    echo "</li>";
                                }
                                ?>
                                <!--<li class="location animated fadeIn in" data-delay="100" data-animation="fadeInUp">Corso Garibaldi, 53 - 70023 Gioia del Colle (BA)</li>
                                <li class="website animated fadeIn in" data-delay="200" data-animation="fadeInUp"><a href="http://www.medicon.com">http://www.sito.com</a></li>
                                <li class="phone animated fadeIn in" data-delay="300" data-animation="fadeInUp"><a href="tel:+390803447278">+39 080 344 7278</a></li>
                                <li class="mail animated fadeIn in" data-delay="400" data-animation="fadeInUp"><a href="mailto:f.cipollino@libero.it">drgiuseppegiorgio@libero.it</a></li>-->
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        
        <!-- Bottom -->
        <div class="bottom">
            <div class="auto-box">
                <?= date('Y') ?> &copy; Studio Odontoiatrico Dr. Giuseppe Giorgio | All rights reserved
            </div>
            
            
            <div class="container">
                <h2 class="border-line-center">Credits</h2>
                <div class="row">
                    <div class="col-sm-6 vera-graphic">
                        <div class="row">
                            <div class="img col-sm-4 mobile-text-center">
                                <a href="<?= Yii::getAlias('@web').'/images/ico/credits/vera-bracco-grapgic-designer.png' ?>" target="_blank">
                                    <img src="<?= Yii::getAlias('@web').'/images/ico/credits/vera-bracco-grapgic-designer.png' ?>" alt="Vera Bracco Graphic Designer" />
                                </a>
                            </div>
                            <div class="description col-sm-8">
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Facebook:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="https://www.facebook.com/Vera-Bracco-Graphic-Design-1589578704479826/" target="_blank">Vera Bracco - Graphic Designer</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Instagam:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="" target="_blank"></a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Email:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="mailto: verabracco.official@gmail.com">verabracco.official@gmail.com</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Telefono:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="tel: 3889738229">388 973 8229</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mattia-webmaster">
                        <div class="row">
                            <div class="img col-sm-5 mobile-text-center">
                                <a href="<?= Yii::getAlias('@web').'/images/ico/credits/mattia-angelillo-web-designer.jpg' ?>" target="_blank">
                                    <img src="<?= Yii::getAlias('@web').'/images/ico/credits/mattia-angelillo-web-designer.jpg' ?>" alt="Mattia Angelillo Web Designer" />
                                </a>
                            </div>
                            <div class="description col-sm-7">
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Facebook:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="https://www.facebook.com/mattia.angelillo" target="_blank">Mattia L- Angelillo - Web Designer</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Instagam:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="https://www.instagram.com/mattiangelillo/" target="_blank">@mattiangelillo</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Email:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="mailto: mattia.angelillo@gmail.com">mattia.angelillo@gmail.com</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right mobile-text-center">Telefono:</div>
                                    <div class="col-sm-9 text-left mobile-text-center"><a href="tel: 3348768832">334 876 8832</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
</div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>