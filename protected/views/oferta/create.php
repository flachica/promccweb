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
	array('label'=>'List Oferta', 'url'=>array('index')),
	array('label'=>'Manage Oferta', 'url'=>array('admin')),
);
?>

<h1>Create Oferta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>