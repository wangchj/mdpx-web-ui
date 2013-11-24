<?php

/**
 * This is the model class for table "Experiments".
 *
 * The followings are the available columns in table 'Experiments':
 * @property integer $experimentId
 * @property string $name
 * @property string $description
 * @property string $dateTime
 * @property integer $isProgrammed
 * @property integer $researcherId
 * @property integer $operatorId
 *
 * The followings are the available model relations:
 * @property ExperimentSetups[] $experimentSetups
 * @property Users $researcher
 * @property Users $operator
 *
 * The following are used for searching:
 * @property string $researcherSearch
 * @property string $operatorSearch
 */
class Experiments extends CActiveRecord
{
    public $researcherSearch;
    public $operatorSearch;

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
			array('experimentId, name, description, dateTime, isProgrammed, researcherId, operatorId', 'required'),
			array('experimentId, isProgrammed, researcherId, operatorId', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('experimentId, name, description, dateTime, isProgrammed, researcherId, operatorId, researcherSearch, operatorSearch', 'safe', 'on'=>'search'),
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
            'experimentSetups' => array(self::HAS_MANY, 'ExperimentSetups', 'experimentId'),
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
            'isProgrammed' => 'Is Programmed',
			'researcherId' => 'Researcher',
			'operatorId' => 'Operator',
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
        $criteria->with = array('researcher', 'operator');
		$criteria->compare('experimentId',$this->experimentId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('dateTime',$this->dateTime,true);
        $criteria->compare('isProgrammed',$this->isProgrammed);
		$criteria->compare('researcherId',$this->researcherId);
		$criteria->compare('operatorId',$this->operatorId);
        if($this->researcherSearch != '')
            $criteria->addCondition("researcher.firstName LIKE '%{$this->researcherSearch}%' OR researcher.lastName LIKE '%{$this->researcherSearch}%'");
        if($this->operatorSearch != '')
            $criteria->addCondition("operator.firstName LIKE '%{$this->operatorSearch}%' OR operator.lastName LIKE '%{$this->operatorSearch}%'");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function getDropdownList()
    {
        $models = self::model()->findAll();
        $result = array();
        foreach($models as $model)
        {
            $result[$model->experimentId] = "$model->name";
        }

        return $result;
    }
}