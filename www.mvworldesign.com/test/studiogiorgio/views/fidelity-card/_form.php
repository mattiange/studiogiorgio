<?php
/**************************************
 * FIDELITY CARD
---------------------------------------
**************************************/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FidelityCard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fidelity-card-form admin-content">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="admin-editor">
    <?= $form->field($model, 'testo')->textarea(['rows' => 6, 'class' => 'editor']) ?>
    </div>
    <div class="admin-options">
        <?= Html::submitButton(Yii::t('app', 'Salva'), ['class' => 'btn btn-success']) ?>

        <div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="picture"><img src="<?= Yii::getAlias('@web/uploads/')?><?= $model->card_fronte ?>" alt="" title="" /></div>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'card_fronte')->fileInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="picture"><img src="<?= Yii::getAlias('@web/uploads/')?><?= $model->card_retro ?>" alt="" title="" /></div>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'card_retro')->fileInput() ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>

<?php
    $this->registerCssFile('@web/css/db.css', 
    [
        'depends' => [yii\bootstrap\BootstrapAsset::className()]
    ]);
    $script = <<< JS
        tinymce.init({
                selector: '.editor',
                height: 500,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor textcolor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table contextmenu paste code help wordcount'
                ],
                toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
                content_css: [
                  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                  '//www.tinymce.com/css/codepen.min.css']
            });
JS;
    $this->registerJsFile('@web/js/jquery.tinymce.min.js', 
            ['depends' => [\yii\web\JqueryAsset::className()]
    ]);
    $this->registerJsFile('@web/js/tinymce.min.js', 
            ['depends' => [\yii\web\JqueryAsset::className()]
    ]);
    $this->registerJs($script, yii\web\View::POS_END);