<?php
/**
 * *** NUOVA CATEGORIA ***
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorie-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'immagine')->textInput(['maxlength' => true]) ?>-->
    
    <?= $form->field($model, 'immagine')->fileInput() ?>
    
    <?= $form->field($model, 'immagine_categoria')->fileInput() ?>

    <?= $form->field($model, 'intro_text')->textInput() ?>

    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Inserisci'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php $this->registerCssFile('@web/css/db.css', 
        [
            'depends' => [yii\bootstrap\BootstrapAsset::className()]
        ]);?>