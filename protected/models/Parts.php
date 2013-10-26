<?php

/**
 * This is the model class for table "Parts".
 *
 * The followings are the available columns in table 'Parts':
 * @property string $serialNum
 * @property string $type
 * @property string $addedOn
 * @property integer $addedBy
 *
 * The followings are the available model relations:
 * @property PartCategories $type0
 * @property Users $addedBy0
 * @property SetupCameras[] $setupCamerases
 * @property SetupCameras[] $setupCamerases1
 * @property SetupParts[] $setupParts
 */
class Parts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parts the static model class
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
		return 'Parts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serialNum, type, addedOn, addedBy', 'required'),
			array('addedBy', 'numerical', 'integerOnly'=>true),
			array('serialNum, type', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('serialNum, type, addedOn, addedBy', 'safe', 'on'=>'search'),
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
            'type0' => array(self::BELONGS_TO, 'PartCategories', 'type'),
            'addedBy0' => array(self::BELONGS_TO, 'Users', 'addedBy'),
            'setupCamerases' => array(self::HAS_MANY, 'SetupCameras', 'lens'),
            'setupCamerases1' => array(self::HAS_MANY, 'SetupCameras', 'filter'),
            'setupParts' => array(self::HAS_MANY, 'SetupParts', 'part'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'serialNum' => 'Serial Number',
			'type' => 'Type',
			'addedOn' => 'Added On',
			'addedBy' => 'Added By',
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

		$criteria->compare('serialNum',$this->serialNum,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('addedOn',$this->addedOn,true);
		$criteria->compare('addedBy',$this->addedBy);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function searchChambers()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('serialNum',$this->serialNum,true);
        $criteria->compare('type',$this->type);
        $criteria->compare('addedOn',$this->addedOn,true);
        $criteria->compare('addedBy',$this->addedBy);
        $criteria->addBetweenCondition('type', '1000', '1999');

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Gets the serial number and name of parts. This is to be used to populate
     * dropdown lists in views.
     * @return array an array of parts.
     */
    public static function getPartsDropdownList()
    {
        $parts = Parts::model()->findAll();
        $result = array();
        $result[''] = '[No value]';
        foreach($parts as $part)
        {
            $result[$part->serialNum] = "$part->name ($part->serialNum)";
        }

        return $result;
    }
}