<?php
/**
 * PAGINA DI ERRORE DEL SITO
 */

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    
    <?php if($exception->statusCode) : ?>
    <h1>ERROR: 404 - PAGINA NON TROVATA</h1>
    <p>
        <br />
        <img src="<?= Yii::getAlias('@web'); ?>/images/error/404.jpg" style="display: block;margin: 0 auto;" />
    </p>
    <?php endif; ?>

    <!--<div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>-->

</div>
