<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
?>

<div class="container-fluid">
   <div class="row-fluid">
      <div class="span12">
         <h1>Contacte con nosotros</h1>

         <?php if(Yii::app()->user->hasFlash('contact')): ?>

         <div class="flash-success">
	         <?php echo Yii::app()->user->getFlash('contact'); ?>
         </div>

         <?php else: ?>

         <p>
         Puede ponerse en contacto con nosotros rellenando los siguientes datos:
         </p>

         <div class="form">

         <?php $form=$this->beginWidget('TbActiveForm', array(
	         'id'=>'contact-form',
	         'enableClientValidation'=>true,
	         'clientOptions'=>array(
		         'validateOnSubmit'=>true,
	         ),
         )); ?>

	         <p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	         <?php echo $form->errorSummary($model); ?>

	         <div class="row">
		         <?php echo $form->labelEx($model,'name'); ?>
		         <?php echo $form->textField($model,'name'); ?>
		         <?php echo $form->error($model,'name'); ?>
	         </div>

	         <div class="row">
		         <?php echo $form->labelEx($model,'email'); ?>
		         <?php echo $form->textField($model,'email'); ?>
		         <?php echo $form->error($model,'email'); ?>
	         </div>

	         <div class="row">
		         <?php echo $form->labelEx($model,'subject'); ?>
		         <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		         <?php echo $form->error($model,'subject'); ?>
	         </div>

	         <div class="row">
		         <?php echo $form->labelEx($model,'body'); ?>
		         <?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		         <?php echo $form->error($model,'body'); ?>
	         </div>

	         <?php if(CCaptcha::checkRequirements()): ?>
	         <div class="row">
		         <?php echo $form->labelEx($model,'verifyCode'); ?>
		         <div>
		         <?php $this->widget('CCaptcha'); ?>
		         <?php echo $form->textField($model,'verifyCode'); ?>
		         </div>
		         <div class="hint">Por favor, introduzca las letras de la imagen.
		         <br/>No se tiene en cuenta las mayúsculas.</div>
		         <?php echo $form->error($model,'verifyCode'); ?>
	         </div>
	         <?php endif; ?>

	         <div class="row buttons">
		         <?php echo CHtml::submitButton('Enviar'); ?>
	         </div>

         <?php $this->endWidget(); ?>

         </div><!-- form -->
      </div>
   </div>
</div>
<?php endif; ?>
