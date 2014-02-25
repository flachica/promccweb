<?php
/* @var $this TiendaController */
/* @var $model Tienda */
?>

<?php
$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tiendas', 'url'=>array('index')),
	array('label'=>'Administrar Tiendas', 'url'=>array('admin')),
);
?>

<h1>Crear Tienda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
