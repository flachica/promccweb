<?php
/* @var $this OfertaController */
/* @var $data Oferta */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('idoferta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idoferta),array('view','id'=>$data->idoferta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtienda')); ?>:</b>
	<?php echo CHtml::encode($data->idtienda); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('numcanjeos')); ?>:</b>
	<?php echo CHtml::encode($data->numcanjeos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechadesde')); ?>:</b>
	<?php echo CHtml::encode($data->fechadesde); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechahasta')); ?>:</b>
	<?php echo CHtml::encode($data->fechahasta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigocanjeo')); ?>:</b>
	<?php echo CHtml::encode($data->codigocanjeo); ?>
	<br />

	*/ ?>

</div>