<?php
/* @var $this AccountmodController */
/* @var $model Accountmod */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<?php echo $form->labelEx($model,'idtienda'); ?>
    <?php 
        $tienda_list = CHtml::listData(Tienda::model()->findAll(), 'idtienda', 'nombre');
        $options = array(
                'tabindex' => '0',
                'empty' => '(Vacío)',
        );
        echo $form->dropDownList($model,'idtienda', $tienda_list, $options);
        $form->error($model,'idtienda');
    ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
