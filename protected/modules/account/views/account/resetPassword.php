<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */

?>

<h1>Reseteo de Password</h1>

<div class="form">

<?php $form=$this->beginWidget('TbActiveForm', array(
	'id'=>'account-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Reseteo'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
