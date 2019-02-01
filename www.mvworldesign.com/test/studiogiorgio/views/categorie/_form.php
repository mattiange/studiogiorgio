<?php
/*************************************************
 * UPDATE "Categorie"
 * -----------------------------------------------
**************************************************/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categorie */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="categorie-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- Nome della categoria -->
    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>    
    <!-- Fine del nome della categoria -->
    
    <!-- Immagine (logo) della categoria -->
    <?= $form->field($model, 'immagine')->fileInput() ?>
    
    <?php if($model->immagine != '') : ?>
    <div class="cat-ico" data-element="categorie-immagine-hidden">
        <div class="delete-ico f-left"></div>
        
        <img class="f-left"
             src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->immagine ?>" />
        
        <input id="categorie-immagine-hidden" 
               name="delete-immagine"
               type="hidden"
               value="" />
    </div>
    <?php endif; ?>
    <!-- Fine immagine -->
    
    <!-- Testo introduttivo -->
    <?= $form->field($model, 'intro_text')->textarea(['maxlength' => true, 'rows' => 6]) ?>
    <!-- Fine testo introduttivo -->
    
    <!-- Descrizione della categoria -->
    <div class="c-both">
    <?= $form->field($model, 'descrizione')->textarea(['rows' => 6, 'class' => 'editor']) ?>
    </div>
    <!-- fine della descrizione -->
    
    <!-- Immagine di sfondo del titolo -->
    <?= $form->field($model, 'immagine_categoria')->fileInput() ?>
    
    <?php if($model->immagine_categoria != ''): ?>
    <div class="title-image" data-element="categorie_title-immagine-hidden">
        <div class="delete-ico f-left"></div>
        
        <img class="f-left"
             src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->immagine_categoria ?>" />
        
        <input id="categorie_title-immagine-hidden" 
               name="delete-immagine_title" 
               type="hidden" 
               value="" />
    </div>
    <?php endif; ?>
    <!-- Fine immagine di sfondo -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Aggiorna'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php 
    $this->registerCssFile('@web/css/db.css', 
    [
        'depends' => [yii\bootstrap\BootstrapAsset::className()]
    ]);
    $script = <<< JS
    jQuery(document).ready(function ($){
        $('.delete-ico').click(function(){
            var el = $(this).parent();
            var tag = el.attr('data-element');
            
            el.hide();
            
            $("#"+tag, el).attr('value', 'delete');
        });
        
        //CONTROLLARE PER BENE
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
    });
JS;
$this->registerJsFile('@web/js/jquery.tinymce.min.js', 
        ['depends' => [\yii\web\JqueryAsset::className()]
]);
$this->registerJsFile('@web/js/tinymce.min.js', 
        ['depends' => [\yii\web\JqueryAsset::className()]
]);
$this->registerJs($script, yii\web\View::POS_END);