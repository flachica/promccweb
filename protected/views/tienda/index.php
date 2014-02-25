<?php
/* @var $this TiendaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Tiendas',
);

$this->menu=array(
	array('label'=>'Crear Tienda','url'=>array('create')),
	array('label'=>'Administrar Tiendas','url'=>array('admin')),
);
?>

<h1>Tiendas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
