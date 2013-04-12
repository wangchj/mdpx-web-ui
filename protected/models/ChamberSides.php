<?php

/**
 * This is the model class for table "ChamberSides".
 *
 * The followings are the available columns in table 'ChamberSides':
 * @property integer $chamberType
 * @property integer $sideId
 * @property string $description
 *
 * The followings are the available model relations:
 * @property PartCategories $chamberType0
 */
class ChamberSides extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChamberSides the static model class
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
		return 'ChamberSides';
	}

    /**
     * @return array|mixed|void the composite primary key of the table.
     */
    public function primaryKey()
    {
        return array('chamberType', 'sideId');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chamberType, sideId, description', 'required'),
			array('chamberType, sideId', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('chamberType, sideId, description', 'safe', 'on'=>'search'),
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
			'chamberType0' => array(self::BELONGS_TO, 'PartCategories', 'chamberType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'chamberType' => 'Chamber Type',
			'sideId' => 'Side',
			'description' => 'Description',
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

		$criteria->compare('chamberType',$this->chamberType);
		$criteria->compare('sideId',$this->sideId);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @param $chamberType int: the part category number that signifies the chamber type.
     * @returns int: an integer that is the next side number for this chamber.
     * i.e. max(sideId) + 1 for this chamber.
     */
    public static function getNextLargerSideNum($chamberType)
    {
        //TODO: Make sure that chamber type is int
        //if(!is_int($chamberType))
        //    throw new Exception("chamber type is invalid.");

        //TODO: make sure that chamber type is present

        $queryCommand = Yii::app()->db->createCommand(
            "SELECT max(sideId) FROM ChamberSides WHERE chamberType=$chamberType");
        return $queryCommand->queryScalar() + 1;
    }
}