<?php

/**
 * This is the model class for table "NewUsers".
 *
 * The followings are the available columns in table 'NewUsers':
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $phone
 * @property string $email
 * @property string $affiliation
 * @property string $password
 */
class NewUsers extends CActiveRecord
{
    /**
     * @var string only used in user registration.
     */
    public $password_repeat;

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
		return 'NewUsers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('firstName, lastName, email, affiliation, password, password_repeat', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName, email, affiliation', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>10),
			array('password,password_repeat', 'length', 'max'=>32),
            array('password', 'compare', 'on'=>'insert'),
            array('password_repeat', 'safe', 'on'=>'insert'),
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
		return array();
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
            'password_repeat' => 'Re-enter Password',
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
}
