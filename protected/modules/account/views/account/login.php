<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm  */

$this->breadcrumbs=array(
	'Login',
);

$cs = Yii::app()->getClientScript();  

$cs->registerScriptFile(
   Yii::app()->baseUrl . '/appnima/js/hope.js',
	CClientScript::POS_END
	);

$cs->registerScriptFile(
   Yii::app()->baseUrl . '/appnima/js/appnima.js',
	CClientScript::POS_END
	);

$cs->registerScriptFile(
   Yii::app()->baseUrl . '/appnima/js/main.js',
	CClientScript::POS_END
	);
?>

<h1>Login</h1>

<p>Introduzca sus credenciales:</p>

<div class="form">
<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
      'beforeValidate'=>new CJavaScriptExpression("beforeLogin")
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<p>
	<?php echo CHtml::link('¿Quiere registrarse?',array('register')); ?>
	<?php echo CHtml::link('¿Ha olvidado su contraseña?',array('resetPassword')); ?>
</p>
