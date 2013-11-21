<?php

/**
 * This is the model class for table "PartCategories".
 *
 * The followings are the available columns in table 'PartCategories':
 * @property string $partCatId
 * @property string $name
 * @property string $description
 * @property string $parent
 * @property boolean $isGroup
 *
 * The followings are the available model relations:
 * @property ChamberSides[] $chamberSides
 * @property PartCategories $parent0
 * @property PartCategories[] $partCategories
 * @property Parts[] $parts
 */
class PartCategories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PartCategories the static model class
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
		return 'PartCategories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partCatId,name,', 'required'),
			array('isGroup', 'boolean'),
            array('partCatId, parent', 'length', 'max'=>30),
			array('name', 'length', 'max'=>20),
            array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('partCatId, name, description, parent, isGroup', 'safe', 'on'=>'search'),
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
			'chamberSides' => array(self::HAS_MANY, 'ChamberSides', 'chamberType'),
			'parent0' => array(self::BELONGS_TO, 'PartCategories', 'parent'),
			'partCategories' => array(self::HAS_MANY, 'PartCategories', 'parent'),
			'parts' => array(self::HAS_MANY, 'Parts', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'partCatId' => 'Part Category ID',
			'name' => 'Name',
            'description' => 'Description',
			'parent' => 'Parent',
			'isGroup' => 'Is Group Category',
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

		$criteria->compare('partCatId',$this->partCatId,true);
		$criteria->compare('name',$this->name,true);
        $criteria->compare('description',$this->description,true);
		$criteria->compare('parent',$this->parent,true);
		$criteria->compare('isGroup',$this->isGroup);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * Gets the next part serial number for a part category.
     * @param integer $catId part category id
     * @return string the next serial number.
     * @throws Exception if part category cannot be found.
     */
    public static function getNextSerialNum($catId)
    {
        $cat = PartCategories::model()->findByPk($catId);
        if($cat == null)
            throw new Exception('Cannot find part cateogry for next serial number.');
        $partCount = count($cat->parts);
        return $catId . '-' . sprintf('%04d', $partCount+1);
    }
}