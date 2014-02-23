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
	array('label'=>'List Centrocomercial', 'url'=>array('index')),
	array('label'=>'Create Centrocomercial', 'url'=>array('create')),
	array('label'=>'View Centrocomercial', 'url'=>array('view', 'id'=>$model->idcentrocomercial)),
	array('label'=>'Manage Centrocomercial', 'url'=>array('admin')),
);
?>

    <h1>Update Centrocomercial <?php echo $model->idcentrocomercial; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>