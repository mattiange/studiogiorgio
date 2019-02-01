<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategorieSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorie-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCategoria') ?>

    <?= $form->field($model, 'categoria') ?>

    <?= $form->field($model, 'immagine') ?>

    <?= $form->field($model, 'descrizione') ?>

    <?= $form->field($model, 'immagine_categoria') ?>

    <?php // echo $form->field($model, 'intro_text') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
