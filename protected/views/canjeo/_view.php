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

	<b><?php echo CHtml::encode($data->getAttributeLabel('idparticular')); ?>:</b>
	<?php echo CHtml::encode($data->idparticular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>