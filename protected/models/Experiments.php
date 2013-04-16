<?php

/**
 * This is the model class for table "Experiments".
 *
 * The followings are the available columns in table 'Experiments':
 * @property integer $experimentId
 * @property string $name
 * @property string $description
 * @property string $dateTime
 * @property integer $researcherId
 * @property integer $operatorId
 * @property integer $setupId
 * @property string $ExpDataPath
 *
 * The followings are the available model relations:
 * @property ExperimentSetup $setup
 * @property Users $researcher
 * @property Users $operator
 */
class Experiments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Experiments the static model class
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
		return 'Experiments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('experimentId, name, description, dateTime, researcherId, operatorId, setupId, ExpDataPath', 'required'),
			array('experimentId, researcherId, operatorId, setupId', 'numerical', 'integerOnly'=>true),
			array('name, description, ExpDataPath', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('experimentId, name, description, dateTime, researcherId, operatorId, setupId, ExpDataPath', 'safe', 'on'=>'search'),
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
			'setup' => array(self::BELONGS_TO, 'ExperimentSetup', 'setupId'),
			'researcher' => array(self::BELONGS_TO, 'Users', 'researcherId'),
			'operator' => array(self::BELONGS_TO, 'Users', 'operatorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'experimentId' => 'Experiment ID',
			'name' => 'Name',
			'description' => 'Description',
			'dateTime' => 'Date Time',
			'researcherId' => 'Researcher',
			'operatorId' => 'Operator',
			'setupId' => 'Setup',
			'ExpDataPath' => 'Experiment Data File Path',
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

		$criteria->compare('experimentId',$this->experimentId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('dateTime',$this->dateTime,true);
		$criteria->compare('researcherId',$this->researcherId);
		$criteria->compare('operatorId',$this->operatorId);
		$criteria->compare('setupId',$this->setupId);
		$criteria->compare('ExpDataPath',$this->ExpDataPath,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}