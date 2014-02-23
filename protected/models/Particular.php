<?php

/**
 * This is the model class for table "promoshop.particular".
 *
 * The followings are the available columns in table 'promoshop.particular':
 * @property integer $idparticular
 * @property string $nombre
 * @property string $apellidos
 * @property string $nacimiento
 * @property string $sexo
 * @property string $usuario
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Canjeo[] $canjeos
 */
class Particular extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promoshop.particular';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos', 'length', 'max'=>100),
			array('sexo', 'length', 'max'=>1),
			array('usuario, password', 'length', 'max'=>45),
			array('nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idparticular, nombre, apellidos, nacimiento, sexo, usuario, password', 'safe', 'on'=>'search'),
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
			'canjeos' => array(self::HAS_MANY, 'Canjeo', 'idparticular'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idparticular' => 'Idparticular',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'nacimiento' => 'Nacimiento',
			'sexo' => 'Sexo',
			'usuario' => 'Usuario',
			'password' => 'Password',
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

		$criteria->compare('idparticular',$this->idparticular);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('nacimiento',$this->nacimiento,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Particular the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
