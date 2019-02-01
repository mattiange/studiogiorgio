<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorie */

$this->title = Yii::t('app', 'Nuovo servizio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_2', [
        'model' => $model,
    ]) ?>
</div>