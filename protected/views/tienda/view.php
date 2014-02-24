<?php
/* @var $this TiendaController */
/* @var $model Tienda */
?>

<?php
$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	$model->idtienda,
);

$this->menu=array(
	array('label'=>'List Tienda', 'url'=>array('index')),
	array('label'=>'Create Tienda', 'url'=>array('create')),
	array('label'=>'Update Tienda', 'url'=>array('update', 'id'=>$model->idtienda)),
	array('label'=>'Delete Tienda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtienda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tienda', 'url'=>array('admin')),
);
?>

<h1>View Tienda #<?php echo $model->idtienda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idtienda',
		'idcentrocomercial',
		'idaccount',
		'nombre',
		'descripcion',
		'foto',
		'latitud',
		'longitud',
		'activo',
	),
)); ?>