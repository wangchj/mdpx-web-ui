<?php

/**
 * This is the model class for table "VesselSetup".
 *
 * The followings are the available columns in table 'VesselSetup':
 * @property integer $vesselSetupId
 * @property string $name
 * @property string $description
 * @property string $chamber
 * @property string $upperElectrode
 * @property string $lowerElectrode
 * @property string $roughPump
 * @property string $turboPump
 * @property string $massFlowController
 * @property string $pressureGauge
 * @property string $dustShaker
 *
 * The followings are the available model relations:
 * @property SetupCameras[] $setupCamerases
 * @property SetupProbes[] $setupProbes
 * @property VesselPlates[] $vesselPlates
 * @property Parts $chamber0
 * @property Parts $roughPump0
 * @property Parts $turboPump0
 * @property Parts $massFlowController0
 * @property Parts $pressureGauge0
 * @property Parts $dustShaker0
 */
class VesselSetup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VesselSetup the static model class
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
		return 'VesselSetup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vesselSetupId, name, description, chamber, upperElectrode, lowerElectrode, roughPump, turboPump, massFlowController, pressureGauge, dustShaker', 'required'),
			array('vesselSetupId', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>45),
			array('upperElectrode, lowerElectrode, roughPump, turboPump, massFlowController, pressureGauge, dustShaker', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vesselSetupId, name, description, chamber, upperElectrode, lowerElectrode, roughPump, turboPump, massFlowController, pressureGauge, dustShaker', 'safe', 'on'=>'search'),
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
			'setupCamerases' => array(self::HAS_MANY, 'SetupCameras', 'vesselSetupId'),
			'setupProbes' => array(self::HAS_MANY, 'SetupProbes', 'vesselSetupId'),
			'vesselPlates' => array(self::HAS_MANY, 'VesselPlates', 'vesselSetupId'),
            'chamber0' => array(self::BELONGS_TO, 'Parts', 'chamber'),
            'upperElectrode0' => array(self::BELONGS_TO, 'Parts', 'upperElectrode'),
            'lowerElectrode0' => array(self::BELONGS_TO, 'Parts', 'lowerElectrode'),
			'roughPump0' => array(self::BELONGS_TO, 'Parts', 'roughPump'),
			'turboPump0' => array(self::BELONGS_TO, 'Parts', 'turboPump'),
			'massFlowController0' => array(self::BELONGS_TO, 'Parts', 'massFlowController'),
			'pressureGauge0' => array(self::BELONGS_TO, 'Parts', 'pressureGauge'),
			'dustShaker0' => array(self::BELONGS_TO, 'Parts', 'dustShaker'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vesselSetupId' => 'Vessel Setup',
			'name' => 'Name',
			'description' => 'Description',
            'chamber' => 'Chamber',
			'upperElectrode' => 'Upper Electrode',
			'lowerElectrode' => 'Lower Electrode',
			'roughPump' => 'Rough Pump',
			'turboPump' => 'Turbo Pump',
			'massFlowController' => 'Mass Flow Controller',
			'pressureGauge' => 'Pressure Gauge',
			'dustShaker' => 'Dust Shaker',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
        $criteria->compare('chamber',$this->chamber,true);
		$criteria->compare('upperElectrode',$this->upperElectrode,true);
		$criteria->compare('lowerElectrode',$this->lowerElectrode,true);
		$criteria->compare('roughPump',$this->roughPump,true);
		$criteria->compare('turboPump',$this->turboPump,true);
		$criteria->compare('massFlowController',$this->massFlowController,true);
		$criteria->compare('pressureGauge',$this->pressureGauge,true);
		$criteria->compare('dustShaker',$this->dustShaker,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}