<?php

/**
 * This is the model class for table "tienda".
 *
 * The followings are the available columns in table 'tienda':
 * @property integer $idtienda
 * @property integer $idcentrocomercial
 * @property integer $idaccount
 * @property string $nombre
 * @property string $descripcion
 * @property string $foto
 * @property integer $latitud
 * @property integer $longitud
 * @property string $activo
 *
 * The followings are the available model relations:
 * @property Oferta[] $ofertas
 * @property Account $idaccount0
 * @property Centrocomercial $idcentrocomercial0
 */
class Tienda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tienda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcentrocomercial, idaccount, latitud, longitud', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('descripcion, foto', 'length', 'max'=>4000),
			array('activo', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idtienda, idcentrocomercial, idaccount, nombre, descripcion, foto, latitud, longitud, activo', 'safe', 'on'=>'search'),
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
			'ofertas' => array(self::HAS_MANY, 'Oferta', 'idtienda'),
			'idaccount0' => array(self::BELONGS_TO, 'Account', 'idaccount'),
			'idcentrocomercial0' => array(self::BELONGS_TO, 'Centrocomercial', 'idcentrocomercial'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtienda' => 'Idtienda',
			'idcentrocomercial' => 'Idcentrocomercial',
			'idaccount' => 'Idaccount',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'foto' => 'Foto',
			'latitud' => 'Latitud',
			'longitud' => 'Longitud',
			'activo' => 'Activo',
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

		$criteria->compare('idtienda',$this->idtienda);
		$criteria->compare('idcentrocomercial',$this->idcentrocomercial);
		$criteria->compare('idaccount',$this->idaccount);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('latitud',$this->latitud);
		$criteria->compare('longitud',$this->longitud);
		$criteria->compare('activo',$this->activo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tienda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}