<?php 

if (Yii::app()->user->isGuest)
	$this->widget('bootstrap.widgets.TbHeroUnit', array(
		 'heading' => 'Hola',
		 'content' => '<p>Se encuentra en la pantalla de inicio del panel de administración de Promoshop. Para poder gestionar sus ofertas y consultar datos haga login.</p>' . CHtml::link('Login',array('site/login'),array('class'=>'btn btn-primary btn-large')),
	));
else
	$this->widget('bootstrap.widgets.TbHeroUnit', array(
		 'heading' => 'Bienvenido/a',
		 'content' => '<p>Navegue a través del menú superior para administrar Promoshop.</p>',
	)); 

?>
