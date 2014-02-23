<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';

?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<p>Complete la siguiente información para hacer login:</p>

			<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_VERTICAL, 'site/login', 'post'); ?>
				 <fieldset>
					  <legend>Login</legend>
					  <?php echo TbHtml::textField('text', '', array('placeholder' => 'Usuario', 
																					 "id"=>"username", 
																					 "name"=>"username",
																					 'required' => true,
																					)); ?><br/>
					  <?php echo TbHtml::passwordField('text', '', array('placeholder' => 'Contraseña', 
																					 "id"=>"password", 
																					 "name"=>"password",
																					 'required' => true,
																					)); ?>
					  <?php echo TbHtml::checkBox('rememberMe', false, array('label' => 'Recuerdame')); ?>
					  <?php echo TbHtml::submitButton('Entrar', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
				 </fieldset>
			<?php echo TbHtml::endForm(); ?>
		</div>
	</div>
</div>
