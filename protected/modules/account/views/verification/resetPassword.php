<html>
	<body>
      Hola,<br/><br/>
         Hemos recibido una solicitud para proceder con el reseteo de su contraseña de <?php echo Yii::app()->name; ?>, por favor visite:<br />
		<?php $url=Yii::app()->createAbsoluteUrl('/account/account/completeResetPassword', array(
			'account_id'=>$verification->account_id,
			'code'=>$verification->code,
		)); 
		echo CHtml::link($url, $url); ?><br/><br/>

      En caso de que usted no haya sido la persona que ha solicitado esta operación ignore este correo.

      Un saludo.
	</body>
</html>
