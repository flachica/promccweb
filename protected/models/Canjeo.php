<?php

/**
 * This is the model class for table "canjeo".
 *
 * The followings are the available columns in table 'canjeo':
 * @property integer $idcanjeo
 * @property integer $idoferta
 * @property string $fecha
 * @property string $email
 * @property string $codigo
 * @property string $canjeado
 *
 * The followings are the available model relations:
 * @property Oferta $idoferta0
 */
class Canjeo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'canjeo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idoferta', 'numerical', 'integerOnly'=>true),
			array('fecha', 'length', 'max'=>45),
			array('email, codigo', 'length', 'max'=>4000),
			array('canjeado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcanjeo, idoferta, fecha, email, codigo, canjeado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idoferta0' => array(self::BELONGS_TO, 'Oferta', 'idoferta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcanjeo' => 'Idcanjeo',
			'idoferta' => 'Idoferta',
			'fecha' => 'Fecha',
			'email' => 'Email',
			'codigo' => 'Codigo',
			'canjeado' => 'Canjeado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;
        $criteria->compare('idcanjeo',$this->idcanjeo);
		$criteria->compare('idoferta',$this->idoferta);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('codigo',$this->codigo,true);
        if (!isset($this->canjeado))
            $this->canjeado = 0;

		$criteria->compare('canjeado',$this->canjeado);

      //flachica: Miro el rol para ver si es tienda y solo mostrar la info autorizada
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
					$criteria->addCondition("idoferta in (SELECT idoferta
                                                      FROM oferta
                                                      where idtienda =  $idTienda) ");	
				}
			} else if ($rolRow['itemname'] != 'Administrador') {
				$criteria->addCondition('id = -1');
			}
		}
      //fin flachica

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Canjeo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
