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
	array('label'=>'List Particular', 'url'=>array('index')),
	array('label'=>'Create Particular', 'url'=>array('create')),
	array('label'=>'View Particular', 'url'=>array('view', 'id'=>$model->idparticular)),
	array('label'=>'Manage Particular', 'url'=>array('admin')),
);
?>

    <h1>Update Particular <?php echo $model->idparticular; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>