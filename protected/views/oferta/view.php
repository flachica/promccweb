<?php
/* @var $this OfertaController */
/* @var $model Oferta */
?>

<?php
$this->breadcrumbs=array(
	'Ofertas'=>array('index'),
	$model->idoferta,
);

$this->menu=array(
	array('label'=>'Listar Ofertas', 'url'=>array('index')),
	array('label'=>'Crear Oferta', 'url'=>array('create')),
	array('label'=>'Actualizar Oferta', 'url'=>array('update', 'id'=>$model->idoferta)),
	array('label'=>'Eliminar Oferta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idoferta),'confirm'=>'¿Seguro que desea eliminar el registro?')),
	array('label'=>'Administrar Ofertas', 'url'=>array('admin')),
);
?>

<h1>Ver Oferta #<?php echo $model->idoferta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idoferta',
		'idtienda',
		'nombre',
		'descripcion',
		'foto',
		'numcanjeos',
		'fechadesde',
		'fechahasta',
		'precio',
		'codigocanjeo',
	),
)); ?>
