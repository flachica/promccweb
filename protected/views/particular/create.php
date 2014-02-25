<?php
/* @var $this ParticularController */
/* @var $model Particular */
?>

<?php
$this->breadcrumbs=array(
	'Particulars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<h1>Crear Cliente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
