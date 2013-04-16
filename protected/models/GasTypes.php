<?php

/**
 * This is the model class for table "GasTypes".
 *
 * The followings are the available columns in table 'GasTypes':
 * @property integer $gasTypeId
 * @property string $name
 *
 * The followings are the available model relations:
 * @property ExperimentSetup[] $experimentSetups
 * @property ExperimentSetup[] $experimentSetups1
 */
class GasTypes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GasTypes the static model class
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
		return 'GasTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gasTypeId, name', 'required'),
			array('gasTypeId', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('gasTypeId, name', 'safe', 'on'=>'search'),
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
			'experimentSetups' => array(self::HAS_MANY, 'ExperimentSetup', 'gasType1'),
			'experimentSetups1' => array(self::HAS_MANY, 'ExperimentSetup', 'gasType2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gasTypeId' => 'Gas Type ID',
			'name' => 'Name',
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

		$criteria->compare('gasTypeId',$this->gasTypeId);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Gets a list of gas types to be used in dropdown selection menu.
     * @return array in the format array(int=>string, int=>string, ...).
     * @example array(1=>'1:argon', 2=>'2:krypton', ...)
     */
    public static function getGasTypeDropdownList()
    {
        $gasTypes = GasTypes::model()->findAll();
        $result = array();
        foreach($gasTypes as $gasType)
        {
            $result[$gasType->gasTypeId] = "$gasType->gasTypeId: $gasType->name";
        }

        return $result;
    }
}