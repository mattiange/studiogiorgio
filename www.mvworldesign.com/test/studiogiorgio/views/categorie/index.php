<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Servizi');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorie-index page">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Categorie'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'idCategoria',
            'categoria',
            //'immagine',
            [
                'attribute' => 'immagine',
                'format' => 'html',
                'value' => function ($model) {
                    $path = Yii::getAlias('@web/uploads/').$model->immagine;
                    
                    $img = Html::img($path);
                    
                    return $img;
                },
            ],
            //'descrizione:ntext',
            //'immagine_categoria', 
            [
                'attribute' => 'immagine_categoria',
                'format' => 'html',
                'value' => function ($model) {
                    $path = Yii::getAlias('@web/uploads/').$model->immagine_categoria;
                    
                    $img = Html::img($path);
                    
                    return $img;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                /*'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                  'view' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                  'title' => Yii::t('app', 'lead-view'),
                      ]);
                  },

                  'update' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                  'title' => Yii::t('app', 'lead-update'),
                      ]);
                  },
              'delete' => function ($url, $model) {
                  return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                              'title' => Yii::t('app', 'lead-delete'),
                  ]);
              }

            ],
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url ='index.php?r=client-login/lead-view&id='.$model->id;
                    return $url;
                }

                if ($action === 'update') {
                    $url ='index.php?r=client-login/lead-update&id='.$model->id;
                    return $url;
                }
                if ($action === 'delete') {
                    $url ='index.php?r=client-login/lead-delete&id='.$model->id;
                    return $url;
                }

            }*/
            ],
        ],
    ]); ?>
</div>

<?php $this->registerCssFile('@web/css/db.index.css', 
        [
            'depends' => [yii\bootstrap\BootstrapAsset::className()]
        ]);?>