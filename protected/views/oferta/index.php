<?php
/* @var $this OfertaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Ofertas',
);

$this->menu=array(
	array('label'=>'Crear Oferta','url'=>array('create')),
	array('label'=>'Administrar Ofertas','url'=>array('admin')),
);
?>

<h1>Ofertas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
