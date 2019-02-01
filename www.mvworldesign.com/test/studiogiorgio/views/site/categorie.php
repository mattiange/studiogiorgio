<?php
/*********************************
 * VISUALIZZA TUTTE LE CATEGORIE
*********************************/
/* var $model app\models\Categorie */

use yii\helpers\Url;
    
$this->title = "Categorie";
?>
<br /><br />

<div class="col-sm-12">
    <section class="services">
        <div class="auto-box">
            <div class="row clearfix">
                <?php foreach ($model->find()->all() as $k_cat => $cat) : ?>
                <div  class="box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <span class="icon">
                        <img src="<?= Yii::getAlias('@web').'/uploads/'.$cat->immagine ?>" alt="" />
                    </span>
                    
                    <h3>
                        <a href="<?= Url::toRoute(['site/category', 'id' => $cat->idCategoria]); ?>">
                            <?= $cat->categoria ?>
                        </a>
                    </h3>

                    <div class="content"><textarea readonly="readonly"
                            class="countWords"
                            data-max-length="255"
                            style="width: 100%;height: 100%;overflow: hidden;resize: none;"><?= ($cat->intro_text==""?$cat->descrizione:$cat->intro_text) ?></textarea></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?php
$script = <<< JS
    jQuery(document).ready(function(){
        jQuery(".countWords").counterWords({});
    });
JS;
$this->registerJsFile('@web/js/jquery.counterWords.js', 
        ['depends' => [\yii\web\JqueryAsset::className()]
]);
$this->registerJs($script, yii\web\View::POS_END);