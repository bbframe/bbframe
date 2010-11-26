<?php
class SessionHandle
{
	private $sessionKey = NULL;
	private $sessionTimeout = 300;
	public $sessionVars = array();
	private $modelObj;

	public function __construct()
	{
		$this->modelObj = new Model();
	}

	public function start()
	{
		if (@$_COOKIE['sess_key'])
		{
			if ($this->check())
			{
			$this->sessionKey = $_COOKIE['sess_key'];
			$this->getVars();
			//echo "Check session at database if OK fill session->SessionId&session->sessionTimeout";
			}
		}
		else
		{
			$this->sessionTimeout += time();
			$this->sessionKey = $this->keyGen();
			$this->register();
		}
	}
	public function register()
	{
		$this->modelObj->_modelTable = 'session';

		$_sqlArray = array();
		$_sqlArray['sessionId'] = '';
		$_sqlArray['sessionKey'] = $this->sessionKey;
		$_sqlArray['ipAddr'] = $_SERVER["REMOTE_ADDR"];
		$_sqlArray['timeout'] = $this->sessionTimeout;
		
		$this->modelObj->save($_sqlArray);
		setcookie("sess_key",$this->sessionKey,$this->sessionTimeout,'/');
	}
	public function check()
	{
		$this->modelObj->_modelTable = 'session';
		$result = $this->modelObj->select('sessionKey',$_COOKIE['sess_key']);
		return (count($result) == 1) ? true : false ;
	}
	public function setVar($_varName, $_varValue)
	{
		$this->modelObj->_modelTable = 'session_vars';
		$_sqlArray = array();
		$_sqlArray['sessionKey'] = $this->sessionKey;
		$_sqlArray['sessionVar'] = $_varName;
		$_sqlArray['sessionValue'] = $_varValue;
		$this->modelObj->save($_sqlArray);
	}
	
	
	public function getVars()
	{
		$this->modelObj->_modelTable = 'session_vars';
		$_result = $this->modelObj->select('sessionKey', $this->sessionKey);
		$this->sessionVars['userId']=$_result[0]['sessionValue'];
		$this->sessionVars['userName']=$_result[1]['sessionValue'];
		return $this->sessionVars;
	}
	
	public function delete ()
	{
		$this->modelObj->_modelTable = 'session_vars';
		$this->modelObj->delete('sessionKey', $this->sessionKey);
		
		$this->modelObj->_modelTable = 'session';
		$this->modelObj->delete('sessionKey', $this->sessionKey);
		
		setcookie('sess_key', '', time() - 3600,'/');
	}
	
	private function keyGen ()
	{
		return md5(mt_rand().time());
	}
}

?>