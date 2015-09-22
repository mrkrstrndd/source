<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>


<div class='container'>
<?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'formContainer'], ]); ?>
 	<?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Username', 'required' => 'required'])->label(false) ?>
	<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required'])->label(false) ?>
	<?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-length', 'name' => 'login-button']) ?>
	<?php if ($model->hasErrors()): ?>
		<div class=''>My fascinating error summary without any error message</div>
	<?php endif; ?>
<?php ActiveForm::end(); ?>

</div>