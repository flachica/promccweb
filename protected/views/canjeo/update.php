<?php
/* @var $this CanjeoController */
/* @var $model Canjeo */
?>

<?php
$this->breadcrumbs=array(
	'Canjeos'=>array('index'),
	$model->idcanjeo=>array('view','id'=>$model->idcanjeo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Canjeo', 'url'=>array('index')),
	array('label'=>'Create Canjeo', 'url'=>array('create')),
	array('label'=>'View Canjeo', 'url'=>array('view', 'id'=>$model->idcanjeo)),
	array('label'=>'Manage Canjeo', 'url'=>array('admin')),
);
?>

    <h1>Update Canjeo <?php echo $model->idcanjeo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>