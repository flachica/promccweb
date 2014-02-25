<?php
/* @var $this ParticularController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Particulars',
);

$this->menu=array(
	array('label'=>'Crear Cliente','url'=>array('create')),
	array('label'=>'Administrar Clientes','url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
