<?php
/* @var $this ParticularController */
/* @var $model Particular */
?>

<?php
$this->breadcrumbs=array(
	'Particulars'=>array('index'),
	$model->idparticular=>array('view','id'=>$model->idparticular),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Ver Cliente', 'url'=>array('view', 'id'=>$model->idparticular)),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

    <h1>Actualizar Cliente <?php echo $model->idparticular; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
