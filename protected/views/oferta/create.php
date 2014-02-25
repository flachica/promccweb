<?php
/* @var $this OfertaController */
/* @var $model Oferta */
?>

<?php
$this->breadcrumbs=array(
	'Ofertas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Ofertas', 'url'=>array('index')),
	array('label'=>'Administrar Ofertas', 'url'=>array('admin')),
);
?>

<h1>Crear Oferta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
