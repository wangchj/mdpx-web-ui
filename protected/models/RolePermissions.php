<?php

/**
 * This is the model class for table "RolePermissions".
 *
 * The followings are the available columns in table 'RolePermissions':
 * @property integer $roleId
 * @property string $controllerId
 * @property string $actionId
 * @property string $access
 *
 * The followings are the available model relations:
 * @property Roles $role
 */
class RolePermissions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'RolePermissions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roleId, controllerId, actionId, access', 'required'),
			array('roleId', 'numerical', 'integerOnly'=>true),
			array('controllerId, actionId', 'length', 'max'=>45),
			array('access', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('roleId, controllerId, actionId, access', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Roles', 'roleId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'roleId' => 'Role',
			'controllerId' => 'Controller',
			'actionId' => 'Action',
			'access' => 'Access',
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

		$criteria->compare('roleId',$this->roleId);
		$criteria->compare('controllerId',$this->controllerId,true);
		$criteria->compare('actionId',$this->actionId,true);
		$criteria->compare('access',$this->access,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RolePermissions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
