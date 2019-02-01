<?php
use yii\helpers\Url;

$this->title = Yii::t('app', 'Amministrazione');
?>
<div class="container-fluid col-height1">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <h2>
            <i class="fa fa-images ico-color-01" aria-hidden="true"></i>
            <a href="<?= Url::to(['slideshow/slideshow']) ?>"><?= Yii::t('app', 'Gestisci lo slideshow') ?></a>
        </h2>
        <p>
            Da questa schermata puoi modificare lo slideshow presente nella homepage del sito.
        </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <h2>
            <i class="fa fa-cogs ico-color-01" aria-hidden="true"></i>
            <a href="<?= Url::to(['categorie/index']) ?>"><?= Yii::t('app', 'Gestisci i servizi') ?></a>
        </h2>
        <p>
            Da questa schermata puoi aggiungere o rimuovere i servizi offerti.
        </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <h2>
            <i class="fa fa-id-card ico-color-01" aria-hidden="true"></i>
            <a href="<?= Url::to(['fidelity-card/update', 'id' => 1]) ?>"><?= Yii::t('app', 'Fidelity Card') ?></a>
        </h2>
        <p>
            Gestisci le promozioni con la fidelity card
        </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <h2>
            <i class="fa fa-facebook-square ico-color-01" aria-hidden="true"></i>
            <a href="<?= Url::to(['facebook/update', 'id'=>1]) ?>"><?= Yii::t('app', 'Facebook') ?></a>
        </h2>
        <p>
            Aggiungi il collegamento alla tua pagina facebook
        </p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <h2>
            <i class="fa fa-info-circle ico-color-01" aria-hidden="true"></i>
            <a href="<?= Url::to(['contatti/index']) ?>"><?= Yii::t('app', 'Contatti') ?></a>
        </h2>
        <p>
            Aggiungi o rimuovi i contatti da mostrare nel sito
        </p>
    </div>
</div>
<?php
$this->registerCssFile('https://use.fontawesome.com/releases/v5.5.0/css/all.css', 
    [
        'depends' => [yii\bootstrap\BootstrapAsset::className()]
    ]);