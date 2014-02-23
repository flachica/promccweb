<?php
/* @var $this ParticularController */
/* @var $model Particular */
?>

<?php
$this->breadcrumbs=array(
	'Particulars'=>array('index'),
	$model->idparticular,
);

$this->menu=array(
	array('label'=>'List Particular', 'url'=>array('index')),
	array('label'=>'Create Particular', 'url'=>array('create')),
	array('label'=>'Update Particular', 'url'=>array('update', 'id'=>$model->idparticular)),
	array('label'=>'Delete Particular', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idparticular),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Particular', 'url'=>array('admin')),
);
?>

<h1>View Particular #<?php echo $model->idparticular; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idparticular',
		'nombre',
		'apellidos',
		'nacimiento',
		'sexo',
		'usuario',
		'password',
	),
)); ?>