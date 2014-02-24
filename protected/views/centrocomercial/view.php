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
	array('label'=>'List Centrocomercial', 'url'=>array('index')),
	array('label'=>'Create Centrocomercial', 'url'=>array('create')),
	array('label'=>'Update Centrocomercial', 'url'=>array('update', 'id'=>$model->idcentrocomercial)),
	array('label'=>'Delete Centrocomercial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcentrocomercial),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Centrocomercial', 'url'=>array('admin')),
);
?>

<h1>View Centrocomercial #<?php echo $model->idcentrocomercial; ?></h1>

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