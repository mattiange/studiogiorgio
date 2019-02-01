<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
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
    <link rel="stylesheet" href="<?= Yii::getAlias('@web/css/admin/admin.css');?>" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrap">
    <?PHP //ADMIN MAIN MENU ?>
    <div id="adminmainmenu" role="navigation">
        <div id="adminmenuwrap">
            <?php NavBar::begin(); ?>
            <?= Nav::widget([
                'options' => ['class'=>'navbar-nav navbar-left', 'id' => 'adminmenu'],
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => "<span class='ico ico16 ico-new_tab16x16 f-left'></span><span title='".Yii::t('app','Visualizza il sito')."' style='margin-left:5px;color:#FFFFE8;font-weight:bolder;'>".Yii::$app->name."</span>",
                        'url' => ['site/index'],
                        'linkOptions' => ['target' => '_blank'],
                    ],
                    ['label' => 'Pannello di controllo', 'url' => ['admin/index']],
                    ['label' => 'Slideshow', 'url' => ['slideshow/slideshow']],
                    ['label' => 'Servizi', 'url' => ['categorie/index']],
                    ['label' => 'Fidelity Card', 'url' => ['fidelity-card/update', 'id'=>1]],
                    ['label' => 'Facebook', 'url' => ['facebook/update', 'id'=>1]],
                    ['label' => 'Contatti', 'url' => ['contatti/index']],
                    ['label' => 'Logout', 'url' => ['site/l'],'options'=>[
                        'style' => 'position:absolute;right:0;top:0',
                        'class' => 'tt-uppercase font-w-bolder'
                    ]],
                ]
            ]); ?>
            <?php NavBar::end(); ?>
        </div>
    </div>
    <?php //END ADMIN MAIN MENU ?>
    
    <div class="info">
        <h1><?= $this->title ?></h1>
    </div>
    
    <?php //BODY CONTENT ?>
    <div class="content-container">
        <?= $content ?>
    </div>
    <?php //END BODY CONTENT ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>