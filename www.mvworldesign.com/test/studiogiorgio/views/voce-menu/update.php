<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VoceMenu */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Voce Menu',
]) . $model->idVoceMeu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Voce Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVoceMeu, 'url' => ['view', 'idVoceMeu' => $model->idVoceMeu, 'menu_id' => $model->menu_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="voce-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
