<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FidelityCard */

$this->title = Yii::t('app', 'Fidelity Card');
?>
<div class="fidelity-card-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>