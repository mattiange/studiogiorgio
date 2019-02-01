<?php
/************************************
 * INSERISCI/MODIFICA SLIDESHOW
************************************/
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Slideshow;

$slideshow = Slideshow::find()->orderBy('posizione')->all();

$model->posizione = count($slideshow) + 1;

/* @var $this yii\web\View */
/* @var $model app\models\Slideshow */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="slideshow-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'immagine')->fileInput() ?>

    <?= $form->field($model, 'posizione')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
