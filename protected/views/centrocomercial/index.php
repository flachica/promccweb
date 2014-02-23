<?php
/* @var $this CentrocomercialController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Centrocomercials',
);

$this->menu=array(
	array('label'=>'Create Centrocomercial','url'=>array('create')),
	array('label'=>'Manage Centrocomercial','url'=>array('admin')),
);
?>

<h1>Centrocomercials</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>