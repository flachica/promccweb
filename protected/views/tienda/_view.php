<?php
/* @var $this TiendaController */
/* @var $data Tienda */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('idtienda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtienda),array('view','id'=>$data->idtienda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcentrocomercial')); ?>:</b>
	<?php echo CHtml::encode($data->idcentrocomercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idaccount')); ?>:</b>
	<?php echo CHtml::encode($data->idaccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?>:</b>
	<?php echo CHtml::encode($data->latitud); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b>
	<?php echo CHtml::encode($data->longitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	*/ ?>

</div>