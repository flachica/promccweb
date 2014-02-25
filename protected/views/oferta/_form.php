<?php
/* @var $this OfertaController */
/* @var $model Oferta */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'oferta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'idtienda',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'descripcion',array('span'=>5,'maxlength'=>4000)); ?>

            <?php echo $form->textFieldControlGroup($model,'foto',array('span'=>5,'maxlength'=>4000)); ?>

            <?php echo $form->textFieldControlGroup($model,'numcanjeos',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'fechadesde',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'fechahasta',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'precio',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'codigocanjeo',array('span'=>5,'maxlength'=>45)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
