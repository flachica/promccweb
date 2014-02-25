<?php 
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm  */

if (Yii::app()->user->isGuest) {
   $registrar = CHtml::link('¿Quiere registrarse?',array('/account/account/register'));
   $recuperar = CHtml::link('¿Ha olvidado su contraseña?',array('/account/account/resetPassword'));
	$this->widget('bootstrap.widgets.TbHeroUnit', array(
		 'heading' => 'Hola',
		 'content' => '<p>Se encuentra en la pantalla de inicio del panel de administración de Promoshop. Para poder gestionar sus ofertas y consultar datos haga login.</p><p>' . $registrar . $recuperar . '</p>' . CHtml::link('Login',array('account/account/login'),array('class'=>'btn btn-primary btn-large')),
	));
} else
	$this->widget('bootstrap.widgets.TbHeroUnit', array(
		 'heading' => 'Bienvenido/a',
		 'content' => '<p>Navegue a través del menú superior para administrar Promoshop.</p>',
	)); 

?>
