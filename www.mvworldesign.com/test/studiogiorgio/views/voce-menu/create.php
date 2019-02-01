<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VoceMenu */

$this->title = Yii::t('app', 'Create Voce Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Voce Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voce-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
