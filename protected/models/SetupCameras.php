<?php

/**
 * This is the model class for table "SetupCameras".
 *
 * The followings are the available columns in table 'SetupCameras':
 * @property integer $vesselSetupId
 * @property string $camera
 * @property integer $side
 * @property string $description
 * @property string $positionR
 * @property string $positionZ
 * @property string $lens
 * @property string $filter
 *
 * The followings are the available model relations:
 * @property Parts $camera0
 * @property Parts $lens0
 * @property Parts $filter0
 * @property VesselSetup $vesselSetup
 */
class SetupCameras extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SetupCameras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

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
			array('vesselSetupId, camera, side, lens, filter', 'required'),
			array('vesselSetupId, side', 'numerical', 'integerOnly'=>true),
			array('camera, lens, filter', 'length', 'max'=>10),
			array('description', 'length', 'max'=>45),
			array('positionR, positionZ', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vesselSetupId, camera, side, description, positionR, positionZ, lens, filter', 'safe', 'on'=>'search'),
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
			'camera0' => array(self::BELONGS_TO, 'Parts', 'camera'),
			'lens0' => array(self::BELONGS_TO, 'Parts', 'lens'),
			'filter0' => array(self::BELONGS_TO, 'Parts', 'filter'),
			'vesselSetup' => array(self::BELONGS_TO, 'VesselSetup', 'vesselSetupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vesselSetupId' => 'Vessel Setup',
			'camera' => 'Camera',
			'side' => 'Side',
			'description' => 'Description',
			'positionR' => 'Position R',
			'positionZ' => 'Position Z',
			'lens' => 'Lens',
			'filter' => 'Filter',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('vesselSetupId',$this->vesselSetupId);
		$criteria->compare('camera',$this->camera,true);
		$criteria->compare('side',$this->side);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('positionR',$this->positionR,true);
		$criteria->compare('positionZ',$this->positionZ,true);
		$criteria->compare('lens',$this->lens,true);
		$criteria->compare('filter',$this->filter,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}