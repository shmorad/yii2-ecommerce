<?php

use yii\bootstrap5\ActiveForm;
use yii\widgets\Pjax;

?>
<?php Pjax::begin() ?>
<?php $addressForm = ActiveForm::begin([
    'action' => ['update_address'],
    'options' => [
        'data-pjax' => 1
    ]
]) ?>
<?= $addressForm->field($userAddress, 'address') ?>
<?= $addressForm->field($userAddress, 'city') ?>
<?= $addressForm->field($userAddress, 'country') ?>
<?= $addressForm->field($userAddress, 'zipcode') ?>
<button class="btn btn-primary">Update</button>
<?php ActiveForm::end() ?>
<?php Pjax::end() ?>