<?php
class UserHandle
{
	public $userName;
	public $userId;
	public $isLogged = false;
	public $sessionObj;
	public $modelObj;

	public function __construct()
	{
		$this->sessionObj = new SessionHandle();
		$this->modelObj = new Model();
	}

	public function login ($_uname,$_upass)
	{
		$user_data = $this->modelObj->cleckLogin($_uname, $_upass);

		if ($user_data)
		{
			$this->userName = $user_data[0]['userName'];
			$this->userId = $user_data[0]['userId'];
			$this->isLogged = true;
			$this->sessionObj->start();
			$this->sessionObj->setVar('userId', $this->userId);
			$this->sessionObj->setVar('userName', $this->userName);
			return true;
		}
		else
		return false;
		//echo "LOGIN FAILED";
	}
	
	public function check ()
	{
		if (@$_COOKIE['sess_key'])
		{
			$this->sessionObj->start();
			$this->userId = $this->sessionObj->sessionVars['userId'];
			$this->userName = $this->sessionObj->sessionVars['userName'];
			$this->isLogged = true;
			return true;
		}
		else
		{
			$this->isLogged = false;
			return false;
		}
		

	}
	public function register ($_username, $_password)
	{
		$this->modelObj->_modelTable = 'users';
		$_sqlArray['userId'] = '';
		$_sqlArray['userName'] = $_username;
		$_sqlArray['userPass'] = md5($_password);
		$_sqlArray['lastLogin'] = time();
		$_sqlArray['register'] = time();
		$this->modelObj->save($_sqlArray);
	}
	
	public function logout()
	{
		$this->isLogged = false;
		$this->userId = '';
		$this->userName = '';

		$this->sessionObj->delete();
	}
}

?>