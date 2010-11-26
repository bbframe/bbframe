<?php
class dbbase
{
	static private $factory;
	private $dbObj;
 
	public function __construct()
	{
		global $_configs;
		$this->dbObj  = new mysqli($_configs['hostname'], $_configs['username'], $_configs['password'], $_configs['database']);
	}

	static public function getFactory()
	{
		if (!self::$factory)
		self::$factory = new self();
		return self::$factory;
	}
    public function getConnect()
    {
    	return $this->dbObj;
    }
}