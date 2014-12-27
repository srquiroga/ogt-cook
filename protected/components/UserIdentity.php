<?php
class UserIdentity extends CUserIdentity
{
	 private $_id;

	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('nick_user'=>$this->username));
		
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		
		else if($user->password_user != sha1($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			
			$this->_id=$user->id;
			$this->errorCode=self::ERROR_NONE;
		}		
		return !$this->errorCode;
	}
	
	public function getId()
    {
        return $this->_id;
    }
}