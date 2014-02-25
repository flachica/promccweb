<?php
/* @var $this CanjeoController */
/* @var $model Canjeo */
?>

<?php
$this->breadcrumbs=array(
	'Canjeos'=>array('index'),
	$model->idcanjeo=>array('view','id'=>$model->idcanjeo),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Canjeos', 'url'=>array('index')),
	array('label'=>'Ver Canjeos', 'url'=>array('view', 'id'=>$model->idcanjeo)),
	array('label'=>'Administrar Canjeos', 'url'=>array('admin')),
);
?>

    <h1>Actualizar Canjeo <?php echo $model->idcanjeo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
