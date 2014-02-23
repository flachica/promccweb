<html>
	<body>
		Para completar el registro en <?php echo Yii::app()->name; ?>, por favor visite:<br />
		<?php $url=Yii::app()->createAbsoluteUrl('/account/account/completeRegister', array(
			'account_id'=>$verification->account_id,
			'code'=>$verification->code,
		)); 
		echo CHtml::link($url, $url); ?>
	</body>
</html>
