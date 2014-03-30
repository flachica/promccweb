<?php
/* @var $this CanjeoController */
/* @var $model Canjeo */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idcanjeo',array('span'=>5)); ?>

                    <?php echo $form->checkBoxControlGroup($model,'canjeado',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'idoferta',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'codigo',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'fecha',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Buscar',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
