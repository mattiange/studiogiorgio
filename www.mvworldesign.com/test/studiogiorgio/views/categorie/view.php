<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categorie */

$this->title = $model->categoria;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorie-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idCategoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idCategoria], [
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
            'idCategoria',
            'categoria',
            'immagine',
            'descrizione:ntext',
            'intro_text',
            'immagine_categoria',
        ],
    ]) ?>

</div>

<?php
$this->registerCssFile('@web/css/db.view.css', 
        [
            'depends' => [yii\bootstrap\BootstrapAsset::className()]
        ]);
?>