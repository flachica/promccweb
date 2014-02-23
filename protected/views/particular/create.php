<?php
/* @var $this ParticularController */
/* @var $model Particular */
?>

<?php
$this->breadcrumbs=array(
	'Particulars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Particular', 'url'=>array('index')),
	array('label'=>'Manage Particular', 'url'=>array('admin')),
);
?>

<h1>Create Particular</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>