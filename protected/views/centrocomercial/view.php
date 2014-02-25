<?php
/* @var $this CentrocomercialController */
/* @var $model Centrocomercial */
?>

<?php
$this->breadcrumbs=array(
	'Centrocomercials'=>array('index'),
	$model->idcentrocomercial,
);

$this->menu=array(
	array('label'=>'Listar Centros comerciales', 'url'=>array('index')),
	array('label'=>'Crear Centro comercial', 'url'=>array('create')),
	array('label'=>'Actualizar Centro comercial', 'url'=>array('update', 'id'=>$model->idcentrocomercial)),
	array('label'=>'Eliminar Centro comercial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcentrocomercial),'confirm'=>'¿Seguro/a que desea eliminar el registro?')),
	array('label'=>'Administrar Centros comerciales', 'url'=>array('admin')),
);
?>

<h1>Ver Centro comercial #<?php echo $model->idcentrocomercial; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idcentrocomercial',
		'nombre',
		'descripcion',
		'foto',
		'latitud',
		'longitud',
		'direccion',
		'poblacion',
		'provincia',
		'activo',
	),
)); ?>
