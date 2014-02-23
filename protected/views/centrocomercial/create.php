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
	array('label'=>'List Centrocomercial', 'url'=>array('index')),
	array('label'=>'Manage Centrocomercial', 'url'=>array('admin')),
);
?>

<h1>Create Centrocomercial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>