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
	array('label'=>'List Canjeo', 'url'=>array('index')),
	array('label'=>'Create Canjeo', 'url'=>array('create')),
	array('label'=>'Update Canjeo', 'url'=>array('update', 'id'=>$model->idcanjeo)),
	array('label'=>'Delete Canjeo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcanjeo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Canjeo', 'url'=>array('admin')),
);
?>

<h1>View Canjeo #<?php echo $model->idcanjeo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'idcanjeo',
		'idoferta',
		'idparticular',
		'fecha',
	),
)); ?>