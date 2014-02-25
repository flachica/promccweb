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
	array('label'=>'Listar Tiendas', 'url'=>array('index')),
	array('label'=>'Crear Tienda', 'url'=>array('create')),
	array('label'=>'Actualizar Tienda', 'url'=>array('update', 'id'=>$model->idtienda)),
	array('label'=>'Eliminar Tienda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtienda),'confirm'=>'¿Seguro que desea eliminar el registro?')),
	array('label'=>'Administrar Tiendas', 'url'=>array('admin')),
);
?>

<h1>Ver Tienda #<?php echo $model->idtienda; ?></h1>

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
