<?php
/* @var $this TiendaController */
/* @var $model Tienda */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'tienda-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->labelEx($model,'idcentrocomercial'); ?>
            <?php 
                $cc_list = CHtml::listData(Centrocomercial::model()->findAll(), 'idcentrocomercial', 'nombre');
                $options = array(
                        'tabindex' => '0',
                        'empty' => '(Vacío)',
                );
                echo $form->dropDownList($model,'idcentrocomercial', $cc_list, $options);
                $form->error($model,'idcentrocomercial');
            ?>
            
            <?php /*echo $form->textFieldControlGroup($model,'idcentrocomercial',array('span'=>5));*/ ?>

            <?php echo $form->textFieldControlGroup($model,'idaccount',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'descripcion',array('span'=>5,'maxlength'=>4000)); ?>

            <?php echo $form->textFieldControlGroup($model,'foto',array('span'=>5,'maxlength'=>4000)); ?>

            <?php echo $form->textFieldControlGroup($model,'latitud',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'longitud',array('span'=>5)); ?>

            <?php $this->widget('ext.coordinatepicker.CoordinatePicker', array(
                    'model' => $model,
                    'latitudeAttribute' => 'latitud',
                    'longitudeAttribute' => 'longitud',
                    //optional settings
                    'editZoom' => 15,
                    'pickZoom' => 15,
                    'defaultLatitude' => 40.43794472516468,
                    'defaultLongitude' => -3.6795366500000455,
                    'label' => 'Picarlo de un mapa',
                ));
            ?>
            
            <?php echo $form->labelEx($model,'activo'); ?>
            <?php echo $form->checkBox($model,'activo',array('value'=>'Y', 'uncheckValue'=>'N')); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
