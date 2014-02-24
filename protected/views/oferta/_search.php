<?php
/* @var $this OfertaController */
/* @var $model Oferta */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idoferta',array('span'=>5)); ?>

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
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->