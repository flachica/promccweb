<?php
/* @var $this CentrocomercialController */
/* @var $model Centrocomercial */
/* @var $form TbActiveForm */

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

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'centrocomercial-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

<?php echo TbHtml::button('Probar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
          'onclick'=>new CJavaScriptExpression("prueba()")
		)); ?>

    <?php echo $form->errorSummary($model); ?>

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
                    'editZoom' => 25,
                    'pickZoom' => 25,
                    'defaultLatitude' => 40.43794472516468,
                    'defaultLongitude' => -3.6795366500000455,
                    'label' => 'Picarlo de un mapa',
                ));
            ?>
            <?php echo $form->textFieldControlGroup($model,'direccion',array('span'=>5,'maxlength'=>4000)); ?>

            <?php echo $form->textFieldControlGroup($model,'poblacion',array('span'=>5,'maxlength'=>4000)); ?>

            <?php echo $form->textFieldControlGroup($model,'provincia',array('span'=>5,'maxlength'=>4000)); ?>

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
