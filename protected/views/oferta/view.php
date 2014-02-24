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
	array('label'=>'List Oferta', 'url'=>array('index')),
	array('label'=>'Create Oferta', 'url'=>array('create')),
	array('label'=>'Update Oferta', 'url'=>array('update', 'id'=>$model->idoferta)),
	array('label'=>'Delete Oferta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idoferta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Oferta', 'url'=>array('admin')),
);
?>

<h1>View Oferta #<?php echo $model->idoferta; ?></h1>

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