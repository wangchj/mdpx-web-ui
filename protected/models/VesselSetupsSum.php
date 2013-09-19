<?php

/**
 * This is the model class for table "VesselSetups_Sum".
 *
 * The followings are the available columns in table 'VesselSetups_Sum':
 * @property integer $vesselSetupId
 * @property string $name
 * @property string $dateTime
 * @property string $chamber
 * @property string $topElectrode
 * @property string $botElectrode
 * @property string $pump
 * @property string $mfc
 * @property string $pGauge
 */
class VesselSetupsSum extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'VesselSetups_Sum';
	}

    public function primaryKey()
    {
        return 'vesselSetupId';
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dateTime', 'required'),
			array('vesselSetupId', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('chamber, topElectrode, botElectrode, pump, mfc, pGauge', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vesselSetupId, name, dateTime, chamber, topElectrode, botElectrode, pump, mfc, pGauge', 'safe', 'on'=>'search'),
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
			'dateTime' => 'Date Time',
			'chamber' => 'Chamber',
			'topElectrode' => 'Top Electrode',
			'botElectrode' => 'Bot Electrode',
			'pump' => 'Pump',
			'mfc' => 'Mfc',
			'pGauge' => 'P Gauge',
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

		$criteria->compare('vesselSetupId',$this->vesselSetupId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dateTime',$this->dateTime,true);
		$criteria->compare('chamber',$this->chamber,true);
		$criteria->compare('topElectrode',$this->topElectrode,true);
		$criteria->compare('botElectrode',$this->botElectrode,true);
		$criteria->compare('pump',$this->pump,true);
		$criteria->compare('mfc',$this->mfc,true);
		$criteria->compare('pGauge',$this->pGauge,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VesselSetupsSum the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
