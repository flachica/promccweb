<?php
/* @var $this CanjeoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Canjeos',
);

$this->menu=array(
	array('label'=>'Create Canjeo','url'=>array('create')),
	array('label'=>'Manage Canjeo','url'=>array('admin')),
);
?>

<h1>Canjeos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>