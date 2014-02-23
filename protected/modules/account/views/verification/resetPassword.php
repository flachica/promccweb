<html>
	<body>
		Para completar el reseteo de su contraseña de <?php echo Yii::app()->name; ?>, por favor visite:<br />
		<?php $url=Yii::app()->createAbsoluteUrl('/account/account/completeResetPassword', array(
			'account_id'=>$verification->account_id,
			'code'=>$verification->code,
		)); 
		echo CHtml::link($url, $url); ?>
	</body>
</html>
