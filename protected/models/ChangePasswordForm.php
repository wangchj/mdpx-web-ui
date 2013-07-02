<?php

/**
 * ChangePasswordForm class.
 * ChangePasswordForm is the data structure for keep forming information when a user changes password.
 * It is used by the 'changePassowrd' action of 'SiteController'.
 */
class ChangePasswordForm extends CFormModel
{
	public $oldPwd;
    public $newPwd;
    public $newPwd_repeat;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('oldPwd, newPwd, newPwd_repeat', 'required'),
            array('oldPwd, newPwd, newPwd_repeat', 'length', 'max'=>32),
            array('newPwd', 'compare'),
            // password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'oldPwd'=>'Current Password',
            'newPwd'=>'New Password',
            'newPwd_repeat'=>'Re-enter new password',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

}
