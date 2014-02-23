<?php
/* @var $this AccountController */
/* @var $model Account */

$this->menu=array(
	array('label'=>'Cambiar Email', 'url'=>array('changeEmail')),
	array('label'=>'Cambiar Password', 'url'=>array('changePassword')),
	array('label'=>'Dar de baja', 'url'=>array('desactivate')),
);
?>

<h1>Cuenta</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
	),
)); ?>
