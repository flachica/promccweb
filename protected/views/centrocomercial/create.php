<?php
/* @var $this CentrocomercialController */
/* @var $model Centrocomercial */
?>

<?php
$this->breadcrumbs=array(
	'Centrocomercials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Centros comerciales', 'url'=>array('index')),
	array('label'=>'Administrar Centros comerciales', 'url'=>array('admin')),
);
?>

<h1>Crear Centro comercial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
