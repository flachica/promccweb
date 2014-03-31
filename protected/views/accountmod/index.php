<?php
/* @var $this AccountmodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accounts',
);

$this->menu=array(
	array('label'=>'Crear usuario', 'url'=>array('create')),
	array('label'=>'Administrar usuario', 'url'=>array('admin')),
);
?>

<h1>Accounts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
