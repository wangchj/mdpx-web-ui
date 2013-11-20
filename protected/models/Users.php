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
 * @property Roles[] $roles
 */
class Users extends CActiveRecord
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
			array('firstName, lastName, email, affiliation', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('firstName, lastName, email, affiliation', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>10),
            array('password,password_repeat', 'required', 'on'=>'insert'),
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
		return array(
			'experiments' => array(self::HAS_MANY, 'Experiments', 'researcherId'),
			'experiments1' => array(self::HAS_MANY, 'Experiments', 'operatorId'),
			'parts' => array(self::HAS_MANY, 'Parts', 'addedBy'),
            'roles' => array(self::MANY_MANY, 'Roles', 'UserRoles(userId, roleId)'),
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
	
	/**
	 * Performs one-way encryption of a string using md5.
	 * @param string $password
	 * @return Encrypted string.
	 */
	public static function encryptPassword($password)
	{
		return md5($password);
	}

    /**
     * Insert special characters to make phone number more readable.
     * @param $unformattedPoneStr unformatted phone string.
     * @return formmated phone number string.
     */
    public static function formatPhone($unformattedPoneStr)
    {
        $result = "($unformattedPoneStr";
        $result = substr_replace($result, ')', 4, 0);
        $result = substr_replace($result, '-', 8, 0);
        return $result;
    }

    /**
     * Strip phone number formats by taking out special characters such as (, ), and -
     * @param string $formattedPhoneStr phone string that are formatted by formatPhone()
     * @return string integer string
     */
    public static function unformatPhone($formattedPhoneStr)
    {
        return str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $formattedPhoneStr))));
    }

    public static function getDropdownList()
    {
        $users = Users::model()->findAll();
        $result = array();
        foreach($users as $user)
        {
            $result[$user->userId] = "$user->userId: $user->firstName $user->lastName";
        }

        return $result;
    }
}
