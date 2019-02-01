<?php
/* @var $this yii\web\View */
/* @var $model app\models\Contatti */

$this->title = Yii::t('app', 'Nuovo Contatto');
?>
<div class="contatti-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
