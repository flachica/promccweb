<?php
/* @var $this AccountmodController */
/* @var $model Accountmod */

$this->breadcrumbs=array(
	'Accounts'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#account-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Asigne tiendas</h1>

<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'account-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'email',
        'idtienda',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

