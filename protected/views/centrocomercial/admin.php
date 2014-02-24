<?php
/* @var $this CentrocomercialController */
/* @var $model Centrocomercial */


$this->breadcrumbs=array(
	'Centrocomercials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Centrocomercial', 'url'=>array('index')),
	array('label'=>'Create Centrocomercial', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#centrocomercial-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Centrocomercials</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'centrocomercial-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idcentrocomercial',
		'nombre',
		'descripcion',
		'foto',
		'latitud',
		'longitud',
		/*
		'direccion',
		'poblacion',
		'provincia',
		'activo',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>