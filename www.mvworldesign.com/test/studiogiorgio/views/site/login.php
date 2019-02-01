<?php
/*********************************
 * PAGINA DI LOGIN
*********************************/
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div id="content">
        <!-- Begin Content -->
        <div id="element-box" class="login well">
            <img src="<?= Yii::getAlias('@web'); ?>/images/ico/Studio-Giorgio.jpg" />

            <hr />

            <div id="system-message-container"></div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n<div>{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
            ]); ?>

                <?= $form->field($model, 'email')->input('email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <div class="btn-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-large login-button', 'name' => 'login-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<div class="navbar navbar-fixed-bottom hidden-phone">
    <p class="pull-right">&copy;<?= date('Y') ?> Studio Odontoiatrico Giorgio</p>
    <a href="<?= Yii::getAlias('@web') ?>" target="_blank" class="pull-left"><span class="icon-out-2"></span>Torna alla Homepage del sito</a>
</div>

<?php $this->registerCssFile('@web/css/login.css');?>
<?php $this->registerCssFile('http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css');?>