<?php
/* @var $this OfertaController */
/* @var $model Oferta */
?>

<?php
$this->breadcrumbs=array(
	'Ofertas'=>array('index'),
	$model->idoferta=>array('view','id'=>$model->idoferta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Oferta', 'url'=>array('index')),
	array('label'=>'Create Oferta', 'url'=>array('create')),
	array('label'=>'View Oferta', 'url'=>array('view', 'id'=>$model->idoferta)),
	array('label'=>'Manage Oferta', 'url'=>array('admin')),
);
?>

    <h1>Update Oferta <?php echo $model->idoferta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>