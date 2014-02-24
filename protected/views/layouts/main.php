<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php Yii::app()->bootstrap->register(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container-fluid" id="page">
	<div class="row-fluid">
		<div class="span12">

	<!-- <div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('bootstrap.widgets.TbNavbar', array(
					 'brandLabel' => 'Panel de Administración',
					 'display' => null, // default is static to top
					 'items' => array(
						  array(
								'class' => 'bootstrap.widgets.TbNav',
								'items' => array(
								    array('label' => 'Inicio', 'url' => array('/site/index')),
									 //array('label'=>'Register', 'url'=>array('/account/account/register'), 'visible'=>Yii::app()->user->isGuest),
                           array('label'=>'Login', 'url'=>array('/account/account/login'), 'visible'=>Yii::app()->user->isGuest),
                           array('label'=>'Mi Cuenta', 'url'=>array('/account/account/account'), 'visible'=>!Yii::app()->user->isGuest),
                           array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/account/account/logout'), 'visible'=>!Yii::app()->user->isGuest)
								),
						  ),
					 ),
				)); ?>
             <?php 
             $flashes = "";
             foreach(Yii::app()->user->getFlashes() as $key => $message) {
                 $flashes .= '<div class="flash-' . $key . '">' . $message . "</div>\n";
             } 
            if ($flashes != "")
               $this->widget('bootstrap.widgets.TbHeroUnit', array(
		             'heading' => 'Atención',
		             'content' => $flashes,
	            )); ?>
	<?php echo $content; ?>
	</div><!-- span12 -->
	</div><!-- row -->
	</div><!-- container page -->
	<footer class="footer">
		<div class="container">
            <p>Copyright &copy; <?php echo date('Y'); ?> de Wion.
				Todos los derechos reservados. <?php echo Yii::powered() . " & "; ?> <a href="https://twitter.com/FernandoLaChica" rel="external">@FernandoLaChica</a></p>
		</div>
	</footer>
</body>
</html>
