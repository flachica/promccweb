<?php
/* @var $this CanjeoController */
/* @var $data Canjeo */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('idcanjeo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcanjeo),array('view','id'=>$data->idcanjeo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idoferta')); ?>:</b>
	<?php echo CHtml::encode($data->idoferta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>
