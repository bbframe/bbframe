<?php
class settingHandle 
{
	private $modelObj;
	public function __construct()
	{
		$this->modelObj = new Model();
		$this->modelObj->_modelTable = 'settings';
	}
	public function get ($_settingName)
	{
		$result = $this->modelObj->select('setting_var',$_settingName);
		if (count($result) != 1) 
			return false;
		else 
			return $result[0]['setting_value'];
	}
	public function update($_updateArray, $_updateId)
	{
		$this->modelObj->update($_updateArray, $_updateId);
	}
}
?>