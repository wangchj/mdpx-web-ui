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
 * @property SetupCameras $setupCameras
 * @property SetupProbes $setupProbes
 *
 * The following are used for searching:
 * @property string $partNameSearch
 * @property string $serialNumSearch
 */
class SetupParts extends CActiveRecord
{
    public $partNameSearch;
    public $serialNumSearch;

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
			array('vesselSetupId, part', 'required'),
			array('setupPartId, vesselSetupId, parent, port', 'numerical', 'integerOnly'=>true),
			array('part', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('setupPartId, vesselSetupId, part, parent, port, partNameSearch, serialNumSearch', 'safe', 'on'=>'search'),
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
            'setupCameras' => array(self::HAS_ONE, 'SetupCameras', 'setupPartId'),
            'setupProbes' => array(self::HAS_ONE, 'SetupProbes', 'setupPartId'),
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
            'partNameSearch' => 'Part Name',
            'serialNumSearch' => 'Serial Number'
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
        $criteria->with = array('part0', 'part0.type0');
		$criteria->compare('setupPartId',$this->setupPartId);
		$criteria->compare('vesselSetupId',$this->vesselSetupId);
		$criteria->compare('part',$this->part,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('port',$this->port);
        $criteria->compare('type0.name', $this->partNameSearch, true);
        $criteria->compare('part0.serialNum', $this->serialNumSearch, true);
        //$criteria->addCondition('hello');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return bool true if this part is a camera.
     */
    public function isCamera()
    {
        return substr($this->part, 0, 5) == '35-01';
    }

    /**
     * @return bool true if this part is a probe.
     */
    public function isProbe()
    {
        return substr($this->part, 0, 2) == '30';
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

    /**
     * @returns integer the depth, or level, of this node. 0 means root node.
     */
    public function getNodeLevel()
    {
        $level = 0;

        for($node = $this; $node->parent0 != null; $node = $node->parent0)
            $level++;

        return $level;
    }
}
