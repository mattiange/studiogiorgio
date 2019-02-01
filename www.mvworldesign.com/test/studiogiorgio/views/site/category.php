<?php
/******************************************************
 * VISUALIZZA LA SINGOLA CATEGORIA, IN BASE AL SUO ID
******************************************************/
/* var app\models\Categorie */

$this->title = $model->categoria;
?>
<div id="categoria" class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="o-hidden" 
                style="
                        margin-bottom: 15px;margin-top: 15px;
                        background-image: url(<?= Yii::getAlias('@web') ?>/uploads/<?= $model->immagine_categoria ?>);
                      ">
                <!--<img class="f-left" src="<?= Yii::getAlias('@web')?>/uploads/<?= $model->immagine ?>" />-->

                <div class="f-left" style="margin-left: 10px;"><?= $this->title ?></div>
            </h3>
            
            <?= $model->descrizione ?>
        </div>
    </div>
</div>