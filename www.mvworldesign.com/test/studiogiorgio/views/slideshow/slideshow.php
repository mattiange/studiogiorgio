<?php
/**
 * GESTIONE SLIDESHOW
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Slideshow;

$i = 0;

/* @var $this yii\web\View */
/* @var $model app\models\Slideshow */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Gestione dello Slideshow'
?>
<div id="slideshow">
    <!--<h3>Gestisci lo slideshow</h3>-->
    
    <div class="strumenti">
        <div class="ico ico-aggiungi"></div>
    </div>
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'slideshowid']]); ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Aggiorna'), ['class' => 'btn btn-success']) ?>
    </div>
    
    <div class="add"></div>
    
    <?php foreach ($model->find()->orderBy('posizione')->all() as $k => $v): ?>
        <div class="row item">
            <div class="strumenti o-hidden">
                <a href="/studiogiorgio/yii2/web/index.php?r=slideshow%2Fdelete&amp;id=<?= $v->idSlideshow ?>" 
                   title="Elimina" 
                   aria-label="Elimina" 
                   data-pjax="0" 
                   data-confirm="Sei sicuro di voler eliminare questo elemento?" 
                   data-method="post"
                   class="f-right">
                        <span class="glyphicon glyphicon-trash"></span>
                </a>
            </div>
            
            <?= $form->field($model, 'idSlideshow[]')->hiddenInput(['value' => $v->idSlideshow])->label(false); ?>
            
            <div class="f-left immagine">
                <img src="<?= Yii::getAlias('@web') ?>/uploads/slideshow/<?= $v->immagine ?>" alt="" />
            </div>

            <div class="f-left">
                <div class="title">
                    <?php print_r($v->immagine) ?>
                </div>

                <div class="posizione">
                    <?= $form->field($model, 'posizione[]')->textInput(
                            [
                                'type' => 'number',
                                'autocomplete' => 'off',
                                'value' => $v->posizione,
                                'data-old_value' => $v->posizione,
                                'data-position' => $i,
                                'min' => '1',
                                'max' => count(Slideshow::find()->all()),
                                'data-id' => $v->idSlideshow,
                            ]) ?>
                </div>

                <?= $form->field($model, 'immagine[]')->label(false)->fileInput(['value' => $v->immagine]) ?>
            </div>
        </div>

        <?php $i ++ ?>
    
    <?php endforeach; ?>
    
    <div class="row item none copy">
        <div class="strumenti o-hidden">
            <div class="ico ico-cancella f-right" onclick="jQuery(this).parent().parent().remove();"></div>
        </div>

        <?= $form->field($model, 'idSlideshow[]')->hiddenInput(
                [
                    'value' => 0,
                ])
            ->label(false); ?>     
        
        <div class="f-left">
            <div class="title">
            </div>
            
            <div class="posizione">
                <?= $form->field($model, 'posizione[]')->textInput(
                    [
                        'type' => 'number',
                        'autocomplete' => 'off',
                        'min' => '1',
                        'data-position' => $i,
                    ]) ?>
            </div>

            <?= $form->field($model, 'immagine[]')->label(false)->fileInput(['data-required' => 'required']) ?>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>


<?php $this->registerCssFile('@web/css/slideshow.gestione.css', 
        [
            'depends' => [yii\bootstrap\BootstrapAsset::className()]
        ]);
$this->registerJsFile('@web/js/photogallery.strumenti.js', 
        ['depends' => [\yii\web\JqueryAsset::className()]
]);