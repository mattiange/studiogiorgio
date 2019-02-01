<?php
/*********************************
 * CONTATTI
---------------------------------
 * Form
********************************/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contatti */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="contatti-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'campo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'voce')->textInput(['maxlength' => true, 'placeholder'=>'Es.: Telefono']) ?>
    
    <?= $form->field($model, 'visualizzare')
            ->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['options'=>['yes'=>['selected'=>true]]])
            ->label('Visualizzare questo contatto nel sito?') ?>
    
    <?= $form->field($model, 'icona')->textInput(['maxlength' => true, 'placeholder'=>'Es.: phone'])
            ->label('Icona (font awesome)') ?>
    <p>Per l'elenco delle icone rifarsi al sito: <a href="https://fontawesome.com/icons?d=gallery" target="_blank">https://fontawesome.com/icons?d=gallery</a></p>
    
    <?= $form->field($model, 'callToAction')->dropDownList([ 
            'null' => 'Null', 'phone' => 'Phone', 'email' => 'Email', 
            'skype' => 'Skype', 'site'=>'Site',],
        ['null'=>['selected'=>true]]) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php
    $this->registerCssFile('@web/css/db.css', 
    [
        'depends' => [yii\bootstrap\BootstrapAsset::className()]
    ]);