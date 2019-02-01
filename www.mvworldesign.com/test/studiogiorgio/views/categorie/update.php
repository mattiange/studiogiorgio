<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorie */

$this->title = Yii::t('app', 'Aggiorna {modelClass}: ', [
    'modelClass' => 'Categorie',
]) . $model->categoria;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCategoria, 'url' => ['view', 'id' => $model->idCategoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categorie-update">
    <br/>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
