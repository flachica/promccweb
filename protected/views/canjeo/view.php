<?php
/* @var $this CanjeoController */
/* @var $model Canjeo */
?>

<?php
$this->breadcrumbs=array(
	'Canjeos'=>array('index'),
	$model->idcanjeo,
);

$this->menu=array(
	array('label'=>'Listar Canjeos', 'url'=>array('index')),
	array('label'=>'Crear Canjeo', 'url'=>array('create')),
	array('label'=>'Actualizar Canjeo', 'url'=>array('update', 'id'=>$model->idcanjeo)),
	array('label'=>'Eliminar Canjeo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcanjeo),'confirm'=>'¿Seguro/a que desea eliminar el registro?')),
	array('label'=>'Administrar Canjeos', 'url'=>array('admin')),
);
?>

<h1>Ver Canjeo #<?php echo $model->idcanjeo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idcanjeo',
		'idoferta',
		'email',
		'codigo',
		'fecha',
	),
)); ?>
