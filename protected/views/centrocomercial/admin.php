<?php
/* @var $this CentrocomercialController */
/* @var $model Centrocomercial */


$this->breadcrumbs=array(
	'Centrocomercials'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Centros comerciales', 'url'=>array('index')),
	array('label'=>'Crear Centro comercial', 'url'=>array('create')),
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

<h1>Administrar Centros comerciales</h1>

<p>
    Opcionalmente puede utilizar los operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) al principio de cada valor de búsqueda.
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
