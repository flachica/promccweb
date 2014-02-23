<?php
/* @var $this CanjeoController */
/* @var $model Canjeo */
?>

<?php
$this->breadcrumbs=array(
	'Canjeos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Canjeo', 'url'=>array('index')),
	array('label'=>'Manage Canjeo', 'url'=>array('admin')),
);
?>

<h1>Create Canjeo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>