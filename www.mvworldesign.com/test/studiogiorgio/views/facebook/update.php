<?php
/* @var $this yii\web\View */
/* @var $model app\models\Facebook */

$this->title = Yii::t('app', 'Facebook: ');
?>
<div class="facebook-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>