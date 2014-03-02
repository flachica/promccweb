<?php
/* @var $this TiendaController */
/* @var $model Tienda */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idtienda',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idcentrocomercial',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idaccount',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'descripcion',array('span'=>5,'maxlength'=>4000)); ?>

                    <?php echo $form->textFieldControlGroup($model,'foto',array('span'=>5,'maxlength'=>4000)); ?>

                    <?php echo $form->textFieldControlGroup($model,'latitud',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'longitud',array('span'=>5)); ?>

                    <?php echo $form->labelEx($model,'activo'); ?>
                    <?php echo $form->checkBox($model,'activo',array('value'=>'Y', 'uncheckValue'=>'N', 'checked'=>'checked')); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Buscar',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
