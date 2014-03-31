<?php
/* @var $this AccountmodController */
/* @var $model Account */

$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Create Account</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
