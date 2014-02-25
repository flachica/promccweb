<?php
/* @var $this TiendaController */
/* @var $model Tienda */


$this->breadcrumbs=array(
	'Tiendas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tiendas', 'url'=>array('index')),
	array('label'=>'Crear Tienda', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tienda-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tiendas</h1>

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
	'id'=>'tienda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idtienda',
		'idcentrocomercial',
		'idaccount',
		'nombre',
		'descripcion',
		'foto',
		/*
		'latitud',
		'longitud',
		'activo',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
