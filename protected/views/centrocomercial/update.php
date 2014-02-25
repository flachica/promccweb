<?php
/* @var $this CentrocomercialController */
/* @var $model Centrocomercial */
?>

<?php
$this->breadcrumbs=array(
	'Centrocomercials'=>array('index'),
	$model->idcentrocomercial=>array('view','id'=>$model->idcentrocomercial),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Centros comerciales', 'url'=>array('index')),
	array('label'=>'Crear Centro comercial', 'url'=>array('create')),
	array('label'=>'Ver Centro comercial', 'url'=>array('view', 'id'=>$model->idcentrocomercial)),
	array('label'=>'Administrar Centros comerciales', 'url'=>array('admin')),
);
?>

    <h1>Actualizar Centro comercial <?php echo $model->idcentrocomercial; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
