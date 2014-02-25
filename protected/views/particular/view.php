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
	array('label'=>'Listar Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->idparticular)),
	array('label'=>'Eliminar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idparticular),'confirm'=>'¿Seguro que desea eliminar el registro?')),
	array('label'=>'Administrar Cliente', 'url'=>array('admin')),
);
?>

<h1>Ver Cliente #<?php echo $model->idparticular; ?></h1>

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
