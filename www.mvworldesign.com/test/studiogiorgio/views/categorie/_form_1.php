<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Categorie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorie-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'parent_id')->textInput() ?>-->
    
    <?= $form->field($model, 'parent_id')->dropDownList(
            ArrayHelper::map($model::find()->all(),'idCategoria','categoria')) ?>

    <!--<?= $form->field($model, 'immagine')->textInput(['maxlength' => true]) ?>-->
    
    <?= $form->field($model, 'immagine')->fileInput() ?>

    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php $this->registerCssFile('@web/css/db.css', 
        [
            'depends' => [yii\bootstrap\BootstrapAsset::className()]
        ]);?>