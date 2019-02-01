<?php
/********************************
 * HOMEPAGE DEL SITO
********************************/
use yii\helpers\Url;
use app\models\Categorie;
use app\models\Slideshow;

$categorie = new Categorie();
    
$this->title = "Studio odontoiatrico dr. Giuseppe Giorgio";
?>
<section id="photogallery" class="animation fadeIn hidden-phone">
    <div class="container">
        <div class="images" data-start="0">
            <?php
                $items = Slideshow::find()->orderBy('posizione')->all();
                
                foreach ($items as $k => $item): ?>
                
                <img src="<?= Yii::getAlias('@web') ?>/uploads/slideshow/<?= $item->immagine ?>"
                     data-item="<?= $k ?>"/>
                
            <?php endforeach; ?>
        </div>

        <div class="prev button"></div>
        <div class="next button"></div>

        <div class="thumb"></div>
    </div>
</section>


<div class="col-sm-12">
    <section class="services">
        <div class="auto-box">
            <h1 class="border-line-center text-center">
                <?= Yii::t('app', 'I nostri servizi') ?>
            </h1>
            
            <div class="row clearfix">
                <?php foreach (Categorie::find()->all() as $k_cat => $cat) : ?>
                <div class="box col-lg-4 col-md-4 col-sm-6 col-xs-12 anim-3-all animated pulse animated-delay-2" 
                     data-delay="0" 
                     data-animation="pulse">
                    <span class="icon">
                        <img src="<?= Yii::getAlias('@web').'/uploads/'.$cat->immagine ?>" alt="" />
                    </span>
                    
                    <h3>
                        <a href="<?= Url::toRoute(['site/category', 'id' => $cat->idCategoria]); ?>">
                            <?= $cat->categoria ?>
                        </a>
                    </h3>
                    
                    <div class="content"><?= $cat->intro_text ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>


<?php $this->registerJsFile(
    '@web/js/photogallery.jquery.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    );
    $this->registerJs(
            'jQuery(document).ready(function(){
                jQuery("#photogallery").photogallery({
                    autoplay : true
                });
            });'
    );
?>