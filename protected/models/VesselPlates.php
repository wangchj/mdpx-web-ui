<?php

/**
 * This is the model class for table "VesselPlates".
 *
 * The followings are the available columns in table 'VesselPlates':
 * @property integer $vesselSetupId
 * @property integer $side
 * @property string $plate
 *
 * The followings are the available model relations:
 * @property Parts $plate0
 * @property VesselSetup $vesselSetup
 */
class VesselPlates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VesselPlates the static model class
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
		return 'VesselPlates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vesselSetupId, side, plate', 'required'),
			array('vesselSetupId, side', 'numerical', 'integerOnly'=>true),
			array('plate', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vesselSetupId, side, plate', 'safe', 'on'=>'search'),
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
			'plate0' => array(self::BELONGS_TO, 'Parts', 'plate'),
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
			'side' => 'Side',
			'plate' => 'Plate',
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
		$criteria->compare('side',$this->side);
		$criteria->compare('plate',$this->plate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}