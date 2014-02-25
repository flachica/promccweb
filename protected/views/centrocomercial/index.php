<?php
/* @var $this CentrocomercialController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Centrocomercials',
);

$this->menu=array(
	array('label'=>'Crear Centro comercial','url'=>array('create')),
	array('label'=>'Administrar Centros comerciales','url'=>array('admin')),
);
?>

<h1>Centros comerciales</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
