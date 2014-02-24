<?php
/* @var $this OfertaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Ofertas',
);

$this->menu=array(
	array('label'=>'Create Oferta','url'=>array('create')),
	array('label'=>'Manage Oferta','url'=>array('admin')),
);
?>

<h1>Ofertas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>