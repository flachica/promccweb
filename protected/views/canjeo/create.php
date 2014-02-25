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
	array('label'=>'Listar Canjeos', 'url'=>array('index')),
	array('label'=>'Administrar Canjeos', 'url'=>array('admin')),
);
?>

<h1>Crear Canjeo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
