<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Unique identifier of the user.
	 * @var int
	 */
	private $id;
	
	/**
	 * Email address of the user being authenticated.
	 * @var string
	 */
	private $email;

	/**
	 * Constructs a new instance with email and password.
	 * @param string $email email of the user that is being authenticated.
	 * @param string $password password of the user that is being authenticated.
	 */
	public function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}
	
	/**
	 * Returns the database primary key of the user of this identity.
	 * This method overrides the getId() of CUserIdentity class.
	 * @return int the unique identify of the user.
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * Returns the full name (first name and last name) of the user.
     * @return string
	 */
	public function getName()
	{
        $user = Users::model()->findByAttributes(array('userId'=>$this->id));
        return $user->firstName . ' ' . $user->lastName;
	}
	
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$password = Users::encryptPassword($this->password);
		$user = Users::model()->findByAttributes(
			array('email'=>$this->email, 'password'=>$password));
		if($user != NULL)
		{
			$this->errorCode=self::ERROR_NONE;
			$this->id = $user->userId;
		}
		else 
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		return !$this->errorCode;
	}
}
