<?php
/* @var $this TiendaController */
/* @var $model Tienda */
?>

<?php
$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	$model->idtienda=>array('view','id'=>$model->idtienda),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tienda', 'url'=>array('index')),
	array('label'=>'Create Tienda', 'url'=>array('create')),
	array('label'=>'View Tienda', 'url'=>array('view', 'id'=>$model->idtienda)),
	array('label'=>'Manage Tienda', 'url'=>array('admin')),
);
?>

    <h1>Update Tienda <?php echo $model->idtienda; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>