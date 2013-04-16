<?php

/**
 * This is the model class for table "ExperimentSetup".
 *
 * The followings are the available columns in table 'ExperimentSetup':
 * @property integer $setupId
 * @property string $name
 * @property string $description
 * @property integer $vesselSetupId
 * @property string $dcVoltageSetpoint
 * @property string $dcCurrentSetpoint
 * @property string $rfPowerSetpoint
 * @property string $pressureSetpoint
 * @property string $magnet1Setpoint
 * @property string $magnet2Setpoint
 * @property string $magnet3Setpoint
 * @property string $magnet4Setpoint
 * @property string $magneticFieldSetpoint
 * @property string $magneticFieldGradientSetpoint
 * @property integer $gasType1
 * @property integer $gasType2
 * @property integer $dustType1
 * @property integer $dustType2
 *
 * The followings are the available model relations:
 * @property DustTypes $dustType10
 * @property DustTypes $dustType20
 * @property GasTypes $gasType10
 * @property GasTypes $gasType20
 * @property Experiments[] $experiments
 */
class ExperimentSetup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ExperimentSetup the static model class
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
		return 'ExperimentSetup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, vesselSetupId, dcVoltageSetpoint, dcCurrentSetpoint, gasType1, gasType2, dustType1, dustType2', 'required'),
			array('setupId, vesselSetupId, gasType1, gasType2, dustType1, dustType2', 'numerical', 'integerOnly'=>true),
			array('name, description, rfPowerSetpoint', 'length', 'max'=>45),
            array('dcVoltageSetpoint, dcCurrentSetpoint, pressureSetpoint, magnet1Setpoint, magnet2Setpoint, magnet3Setpoint, magnet4Setpoint, magneticFieldSetpoint, magneticFieldGradientSetpoint', 'numerical'),
			array('dcVoltageSetpoint, dcCurrentSetpoint, pressureSetpoint, magnet1Setpoint, magnet2Setpoint, magnet3Setpoint, magnet4Setpoint, magneticFieldSetpoint, magneticFieldGradientSetpoint', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('setupId, name, description, vesselSetupId, dcVoltageSetpoint, dcCurrentSetpoint, rfPowerSetpoint, pressureSetpoint, magnet1Setpoint, magnet2Setpoint, magnet3Setpoint, magnet4Setpoint, magneticFieldSetpoint, magneticFieldGradientSetpoint, gasType1, gasType2, dustType1, dustType2', 'safe', 'on'=>'search'),
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
			'dustType10' => array(self::BELONGS_TO, 'DustTypes', 'dustType1'),
			'dustType20' => array(self::BELONGS_TO, 'DustTypes', 'dustType2'),
			'gasType10' => array(self::BELONGS_TO, 'GasTypes', 'gasType1'),
			'gasType20' => array(self::BELONGS_TO, 'GasTypes', 'gasType2'),
			'experiments' => array(self::HAS_MANY, 'Experiments', 'setupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'setupId' => 'Setup',
			'name' => 'Name',
			'description' => 'Description',
			'vesselSetupId' => 'Vessel Setup',
			'dcVoltageSetpoint' => 'Dc Voltage Setpoint',
			'dcCurrentSetpoint' => 'Dc Current Setpoint',
			'rfPowerSetpoint' => 'Rf Power Setpoint',
			'pressureSetpoint' => 'Pressure Setpoint',
			'magnet1Setpoint' => 'Magnet1 Setpoint',
			'magnet2Setpoint' => 'Magnet2 Setpoint',
			'magnet3Setpoint' => 'Magnet3 Setpoint',
			'magnet4Setpoint' => 'Magnet4 Setpoint',
			'magneticFieldSetpoint' => 'Magnetic Field Setpoint',
			'magneticFieldGradientSetpoint' => 'Magnetic Field Gradient Setpoint',
			'gasType1' => 'Gas Type1',
			'gasType2' => 'Gas Type2',
			'dustType1' => 'Dust Type1',
			'dustType2' => 'Dust Type2',
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

		$criteria->compare('setupId',$this->setupId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('vesselSetupId',$this->vesselSetupId);
		$criteria->compare('dcVoltageSetpoint',$this->dcVoltageSetpoint,true);
		$criteria->compare('dcCurrentSetpoint',$this->dcCurrentSetpoint,true);
		$criteria->compare('rfPowerSetpoint',$this->rfPowerSetpoint,true);
		$criteria->compare('pressureSetpoint',$this->pressureSetpoint,true);
		$criteria->compare('magnet1Setpoint',$this->magnet1Setpoint,true);
		$criteria->compare('magnet2Setpoint',$this->magnet2Setpoint,true);
		$criteria->compare('magnet3Setpoint',$this->magnet3Setpoint,true);
		$criteria->compare('magnet4Setpoint',$this->magnet4Setpoint,true);
		$criteria->compare('magneticFieldSetpoint',$this->magneticFieldSetpoint,true);
		$criteria->compare('magneticFieldGradientSetpoint',$this->magneticFieldGradientSetpoint,true);
		$criteria->compare('gasType1',$this->gasType1);
		$criteria->compare('gasType2',$this->gasType2);
		$criteria->compare('dustType1',$this->dustType1);
		$criteria->compare('dustType2',$this->dustType2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}