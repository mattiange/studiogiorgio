<?php
/* @var $this yii\web\View */
/* @var $model app\models\Contatti */

$this->title = Yii::t('app', 'Contatto: ' . $model->campo);
?>
<div class="contatti-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
