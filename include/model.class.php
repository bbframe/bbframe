<?php
class Model
{
	///SCRUD - Search Create Retrieve Update Delete
	/* save()
	 * select()
	 * selectAll()
	 * delete()
	 * checkLogin()
	 */

	public static $mySqliObj;
	public $sqlResultObj;
	public $sqlFetchObj;
	public $_modelName;
	public $_modelTable;

	public function __construct()
	{
		$this->mySqliObj = dbbase::getFactory()->getConnect();
	}

	public function save($_dataArray, $_updateID = NULL)
	{
		foreach ($_dataArray as $_k=>$_v)
			$_dataArray[$_k] = $this->stripInput($_v);
			
		$_sql_query = "INSERT INTO ".$this->_modelTable;
		$_sql_query .= " (".implode(array_keys($_dataArray),',').")";
		$_sql_query .= " VALUES ('".implode(array_values($_dataArray),'\',\'')."');";
		
		$this->sqlQuery($_sql_query,1);
		return true;
	}

	public function update ($_updateArray, $_updateId)
	{
		foreach ($_updateArray as $_k=>$_v)
			$_updateString = $_k ." = '". $_v."',";

		$_updateString = substr($_updateString, 0, -1); 
			
		$_sql_query = "UPDATE ".$this->_modelTable." SET ";
		$_sql_query .= $_updateString;
		$_sql_query .= " WHERE id=".$_updateId;
			
		$this->sqlQuery($_sql_query,1);
	}
	
	public function select($_idName = NULL, $_idValue = NULL)
	{
		$_sql_query = "SELECT * FROM ".$this->_modelTable;
		$_sql_query .= ($_idName) ? " WHERE ".$_idName."='".$_idValue."'" : "";
		return $this->sqlQuery($_sql_query);
	}

	public function selectAll($orderBy = NULL)
	{
		$_sql_query = "SELECT * FROM ".$this->_modelTable;
		$_sql_query .= ($orderBy) ? " ORDER BY id ".$orderBy : "";
		return $this->sqlQuery($_sql_query);
	}

	public function delete($_idName, $_idValue)
	{
		$_sql_query = "DELETE FROM ".$this->_modelTable;
		$_sql_query .= " WHERE ".$_idName."='".$_idValue."'";
		$this->sqlQuery($_sql_query,1);
	}
	
	public function cleckLogin ($_uname, $_upass)
	{
		$_sql_query = "SELECT * FROM users WHERE userName='".$_uname."' AND userPass='".md5($_upass)."'";
		return $this->sqlQuery($_sql_query);
	}
	
	private function sqlQuery($_query, $_noOutput = null)
	{
	 $exectime_start = microtime(true);
		$this->sqlResultObj = $this->mySqliObj->query($_query);

		$exectime_end = microtime(true);
		$exectime = $exectime_end - $exectime_start;
		$exectime = number_format($exectime, 5);

		$_log_query = "INSERT INTO `log_sql` (`qid` ,`query` ,`time` ,`date`) VALUES
			(NULL , '".$_query."', '".$exectime."',CURRENT_TIMESTAMP);";

			
			
		if ($this->mySqliObj->error != '')
		printf("dbHandler->sqlQuery error: %s\n", $this->mySqliObj->error);
		///else if ($_noResult || )
		else if ($_noOutput)
		{
			$out_log = $this->mySqliObj->query($_log_query);
			return true;
		}
		/////check with affected_rows....
		else
		{
			if ($this->sqlResultObj->num_rows == 0)
			return false;
			
			$_result_array = array();
			while($row = $this->sqlResultObj->fetch_array())
			{
				$_result_array[] = $row;
			}
			$out_log = $this->mySqliObj->query($_log_query);
			return $_result_array;
		}
	}
	
	private function stripInput ($_string)
	{
		return $this->mySqliObj->real_escape_string($_string);
	}
}
?>