<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VoceMenu */

$this->title = $model->idVoceMeu;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Voce Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voce-menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idVoceMeu' => $model->idVoceMeu, 'menu_id' => $model->menu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idVoceMeu' => $model->idVoceMeu, 'menu_id' => $model->menu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idVoceMeu',
            'voce',
            'menu_id',
        ],
    ]) ?>

</div>
