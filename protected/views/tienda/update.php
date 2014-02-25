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
	array('label'=>'Listar Tiendas', 'url'=>array('index')),
	array('label'=>'Crear Tienda', 'url'=>array('create')),
	array('label'=>'Ver Tienda', 'url'=>array('view', 'id'=>$model->idtienda)),
	array('label'=>'Administrar Tiendas', 'url'=>array('admin')),
);
?>

    <h1>Actualizar Tienda <?php echo $model->idtienda; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
