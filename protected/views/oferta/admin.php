<?php
/* @var $this OfertaController */
/* @var $model Oferta */


$this->breadcrumbs=array(
	'Ofertas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Ofertas', 'url'=>array('index')),
	array('label'=>'Crear Oferta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#oferta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Ofertas</h1>

<p>
    Opcionalmente puede utilizar los operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) al principio de cada valor de búsqueda.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'oferta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'precio',
        'preciobase',
        'fechadesde',
        'fechahasta',		
        'numcanjeos',
		/*
		'fechadesde',
		'fechahasta',
		'precio',
		'codigocanjeo',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
