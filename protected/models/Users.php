<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $phone
 * @property string $email
 * @property string $affiliation
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Experiments[] $experiments
 * @property Experiments[] $experiments1
 * @property Parts[] $parts
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'Users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, firstName, lastName, email, affiliation, password', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName, email, affiliation', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>10),
			array('password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userId, firstName, lastName, phone, email, affiliation, password', 'safe', 'on'=>'search'),
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
			'experiments' => array(self::HAS_MANY, 'Experiments', 'researcherId'),
			'experiments1' => array(self::HAS_MANY, 'Experiments', 'operatorId'),
			'parts' => array(self::HAS_MANY, 'Parts', 'addedBy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userId' => 'User',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'phone' => 'Phone',
			'email' => 'Email',
			'affiliation' => 'Affiliation',
			'password' => 'Password',
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

		$criteria->compare('userId',$this->userId);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('affiliation',$this->affiliation,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Performs one-way encryption of a string using md5.
	 * @param string $password
	 * @return Encrypted string.
	 */
	public static function encryptPassword($password)
	{
		return md5($password);
	}
}
