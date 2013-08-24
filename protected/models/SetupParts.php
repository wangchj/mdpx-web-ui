<?php

/**
 * This is the model class for table "SetupParts".
 *
 * The followings are the available columns in table 'SetupParts':
 * @property integer $setupPartId
 * @property integer $vesselSetupId
 * @property string $part
 * @property integer $parent
 * @property integer $port
 *
 * The followings are the available model relations:
 * @property Parts $part0
 * @property SetupParts $parent0
 * @property SetupParts[] $setupParts
 * @property VesselSetups $vesselSetup
 */
class SetupParts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SetupParts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setupPartId, vesselSetupId, part', 'required'),
			array('setupPartId, vesselSetupId, parent, port', 'numerical', 'integerOnly'=>true),
			array('part', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('setupPartId, vesselSetupId, part, parent, port', 'safe', 'on'=>'search'),
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
			'part0' => array(self::BELONGS_TO, 'Parts', 'part'),
			'parent0' => array(self::BELONGS_TO, 'SetupParts', 'parent'),
			'setupParts' => array(self::HAS_MANY, 'SetupParts', 'parent'),
			'vesselSetup' => array(self::BELONGS_TO, 'VesselSetups', 'vesselSetupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'setupPartId' => 'Setup Part',
			'vesselSetupId' => 'Vessel Setup',
			'part' => 'Part',
			'parent' => 'Parent',
			'port' => 'Port',
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

		$criteria->compare('setupPartId',$this->setupPartId);
		$criteria->compare('vesselSetupId',$this->vesselSetupId);
		$criteria->compare('part',$this->part,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('port',$this->port);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SetupParts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
