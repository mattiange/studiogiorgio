<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContattiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contatti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idContatto') ?>

    <?= $form->field($model, 'voce') ?>

    <?= $form->field($model, 'visualizzare') ?>

    <?= $form->field($model, 'icona') ?>

    <?= $form->field($model, 'campo') ?>

    <?php // echo $form->field($model, 'callToAction') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
