<?php
/*********************************
 * VISUALIZZA TUTTE LE CATEGORIE
*********************************/
/* var $model app\models\Categorie */
$this->title = "Fidelity Card";
?>
<h1>Scopri la nostra fidelity card</h1>

<div class="container margin-10-0-0-0i margin-0-a">
    <div class="row">
        <div class="col-sm-3">
            <div class="f-left" style="width: 100%;">
                <img src="<?= Yii::getAlias('@web/uploads/') ?><?= $model->card_fronte ?>" 
                     alt="Fidelity Card Fronte, Studio odontoiatrico Giorgio"
                     title="Fidelity Card Fronte, Studio odontoiatrico Giorgio" style="border: 1px solid;" />
                <p></p>
                <img src="<?= Yii::getAlias('@web/uploads/') ?><?= $model->card_retro ?>"
                     alt="Fidelity Card Retro, Studio odontoiatrico Giorgio"
                     title="Fidelity Card Retro, Studio odontoiatrico Giorgio" style="border: 1px solid;" />
            </div>
        </div>
        <div class="col-sm-8">
            <?= $model->testo ?>
        </div>
    </div>
</div>