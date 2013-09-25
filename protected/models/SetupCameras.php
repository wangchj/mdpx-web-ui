<?php

/**
 * This is the model class for table "SetupCameras".
 *
 * The followings are the available columns in table 'SetupCameras':
 * @property integer $setupPartId
 * @property string $description
 * @property string $positionR
 * @property string $positionZ
 * @property string $lens
 * @property string $filter
 *
 * The followings are the available model relations:
 * @property Parts $lens0
 * @property Parts $filter0
 * @property SetupParts $setupPart
 */
class SetupCameras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SetupCameras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setupPartId, lens, filter', 'required'),
			array('setupPartId', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>45),
			array('positionR, positionZ', 'length', 'max'=>18),
            array('positionR, positionZ', 'numerical'),
			array('lens, filter', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('setupPartId, description, positionR, positionZ, lens, filter', 'safe', 'on'=>'search'),
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
			'lens0' => array(self::BELONGS_TO, 'Parts', 'lens'),
			'filter0' => array(self::BELONGS_TO, 'Parts', 'filter'),
			'setupPart' => array(self::BELONGS_TO, 'SetupParts', 'setupPartId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'setupPartId' => 'Setup Part',
			'description' => 'Description',
			'positionR' => 'Position R',
			'positionZ' => 'Position Z',
			'lens' => 'Lens',
			'filter' => 'Filter',
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

		$criteria->compare('setupPartId',$this->setupPartId);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('positionR',$this->positionR,true);
		$criteria->compare('positionZ',$this->positionZ,true);
		$criteria->compare('lens',$this->lens,true);
		$criteria->compare('filter',$this->filter,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SetupCameras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
