<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contatti */

$this->title = "Contatto: ".Yii::t('app', $model->campo);
?>
<div class="contatti-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idContatto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idContatto], [
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
            'idContatto',
            'campo',
            'voce',
            'visualizzare',
            'icona',
            'callToAction',
        ],
    ]) ?>

</div>
