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
	array('label'=>'Listar Ofertas', 'url'=>array('index')),
	array('label'=>'Crear Oferta', 'url'=>array('create')),
	array('label'=>'Ver Oferta', 'url'=>array('view', 'id'=>$model->idoferta)),
	array('label'=>'Administrar Ofertas', 'url'=>array('admin')),
);
?>

    <h1>Actualizar Oferta <?php echo $model->idoferta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
