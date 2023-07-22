<?php

/**
 * \common\model\user $user
 * \common\model\user $userAddress
 */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Address-Information</h3>
            </div>
            <div class="card-body">
                <?php echo $this->render('user_address',[
                    'userAddress' => $userAddress
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>User-Information</h3>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'firstname')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($user, 'lastname')->textInput() ?>
                    </div>
                </div>



                <?= $form->field($user, 'email') ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($user, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($user, 'confirmPassword')->passwordInput() ?>
                    </div>
                </div>



                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>