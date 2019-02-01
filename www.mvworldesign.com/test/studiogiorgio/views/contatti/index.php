<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContattiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contattis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contatti-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="admin-table">
    <p>
        <?= Html::a(Yii::t('app', 'Nuovo Contatto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idContatto',
            'campo',
            'voce',
            'visualizzare',
            'icona',
            'callToAction',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
    <div class="container"></div>
</div>
<?php
    $this->registerCssFile('@web/css/db.css', 
    [
        'depends' => [yii\bootstrap\BootstrapAsset::className()]
    ]);