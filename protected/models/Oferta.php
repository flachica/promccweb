<?php

/**
 * This is the model class for table "promoshop.oferta".
 *
 * The followings are the available columns in table 'promoshop.oferta':
 * @property integer $idoferta
 * @property integer $idtienda
 * @property string $nombre
 * @property string $descripcion
 * @property string $foto
 * @property integer $numcanjeos
 * @property string $fechadesde
 * @property string $fechahasta
 * @property double $precio
 * @property string $codigocanjeo
 *
 * The followings are the available model relations:
 * @property Canjeo[] $canjeos
 * @property Tienda $idtienda0
 */
class Oferta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oferta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtienda, numcanjeos', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('nombre, codigocanjeo', 'length', 'max'=>45),
			array('descripcion, foto', 'length', 'max'=>4000),
			array('fechadesde, fechahasta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idoferta, idtienda, nombre, descripcion, foto, numcanjeos, fechadesde, fechahasta, precio, codigocanjeo', 'safe', 'on'=>'search'),
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
			'canjeos' => array(self::HAS_MANY, 'Canjeo', 'idoferta'),
			'idtienda0' => array(self::BELONGS_TO, 'Tienda', 'idtienda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idoferta' => 'Idoferta',
			'idtienda' => 'Idtienda',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'foto' => 'Foto',
			'numcanjeos' => 'Numcanjeos',
			'fechadesde' => 'Fechadesde',
			'fechahasta' => 'Fechahasta',
			'precio' => 'Precio',
			'codigocanjeo' => 'Codigocanjeo',
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

		$criteria->compare('idoferta',$this->idoferta);
		$criteria->compare('idtienda',$this->idtienda);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('numcanjeos',$this->numcanjeos);
		$criteria->compare('fechadesde',$this->fechadesde,true);
		$criteria->compare('fechahasta',$this->fechahasta,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('codigocanjeo',$this->codigocanjeo,true);

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
					$criteria->addCondition('idtienda = ' . $idTienda);	
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
	 * @return Oferta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
