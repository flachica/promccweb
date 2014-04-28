<?php
/* @var $this OfertaController */
/* @var $model Oferta */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'oferta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

    <p class="help-block">Los campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->labelEx($model,'idtienda'); ?>
            <?php

      //flachica: Miro el rol para ver si es tienda y solo mostrar la info autorizada
		$criteria = new CDbCriteria();
		$rolRow = Yii::app()->db
                      ->createCommand(" SELECT itemname 
					FROM AuthAssignment
					where (itemname = 'Tienda' or itemname = 'Administrador') and
					      userid = " . Yii::app()->user->id)
                      ->queryRow();
		$idTienda = -1;
		if (count($rolRow)>0) {
			if ($rolRow['itemname'] == 'Tienda') {
				$idTiendaRow = Yii::app()->db
				      ->createCommand(" SELECT idtienda 
							FROM account
							where id = " . Yii::app()->user->id)
				      ->queryRow();
				if (count($idTiendaRow)>0) {
					$idTienda = $idTiendaRow['idtienda'];
					$criteria->addCondition('idtienda = ' . $idTienda);	
				}
			} else if ($rolRow['itemname'] != 'Administrador') {
				$criteria->addCondition('id = -1');
			}
		}
      //fin flachica

		$tienda_list = CHtml::listData(Tienda::model()->findAll($criteria), 'idtienda', 'nombre');
                $options = array();
                echo $form->dropDownList($model,'idtienda', $tienda_list, $options);
                $form->error($model,'idtienda');
            ?>

            <?php echo $form->textFieldControlGroup($model,'nombre',array('span'=>5,'maxlength'=>45)); ?>

            <?php echo $form->textFieldControlGroup($model,'descripcion',array('span'=>5,'maxlength'=>4000)); ?>

            <div class="control-group">
                <label class="control-label" for="Oferta_fechadesde">Indique rango de fechas</label>
                <div class="controls form-actions">
                        <?php $this->widget(
                            'yiiwheels.widgets.datetimepicker.WhDateTimePicker',
                            array(
                                'model' => $model,
                                
                                'attribute' => 'fechadesde',
                                'htmlOptions' => array(
                                    'placeholder' => 'Comienzo',
                                    
                                ),
                                'pluginOptions' => array(
                                                        'language' => 'es',
                                                        'weekStart' => 1,
                                                    ),
                            )
                        );
                        ?>

                        <?php $this->widget(
                            'yiiwheels.widgets.datetimepicker.WhDateTimePicker',
                            array(
                                'model' => $model,
                                'attribute' => 'fechahasta',
                                'htmlOptions' => array(
                                    'placeholder' => 'Fin',
                                    'language' => 'es-ES',
                                ),
                                'pluginOptions' => array(
                                                        'language' => 'es',
                                                        'weekStart' => 1,
                                                    ),
                                
                            )
                        );
                        ?>
                </div>
            </div>

            <?php echo $form->fileFieldControlGroup($model, 'foto'); ?>

            <?php if($model->isNewRecord!='1'){ ?>
                <div class="control-group">
                     <?php if (strlen($model->foto)>0)
                            echo CHtml::image($model->foto,"foto",array("width"=>200)); ?>
                </div>
            <?php } ?>

            <?php echo $form->textFieldControlGroup($model,'numcanjeos',array('span'=>5)); ?>

            <?php echo $form->numberFieldControlGroup($model,'precio',array('span'=>5, 'step'=>0.01, 'append' => ' EUR')); ?>
     
            <?php echo $form->numberFieldControlGroup($model,'preciobase',array('span'=>5, 'step'=>0.01, 'append' => ' EUR')); ?>

            <?php echo $form->textFieldControlGroup($model,'codigocanjeo',array('span'=>5,'maxlength'=>45)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
