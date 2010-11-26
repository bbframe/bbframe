<?php
echo "Installation bbframe framework.<br />Step 1 of 1 - <small>(mysql & url setup)</small><br /><br />";

$_confFile = '../include/config.inc.bbf';

if (file_exists($_confFile))
	{
		$_filedata = file_get_contents('asdf.inc.php');
		$_configs = unserialize($_filedata);
		echo "<br /> File & access to mysql server exists - <a href='".$_configs['basepath']."/'>Framework home</a><br />";
		echo "Your configuration value:<br />";
		foreach ($_configs as $k=>$v)
			echo $k.' = '.$v . '<br />';
		echo "<a href='".$_configs['basepath']."/'>Framework home</a>";
	}
else
{
	if (!empty($_POST))
	{
		$_sqllink = @mysqli_connect($_POST['hostname'], $_POST['username'], $_POST['password'], $_POST['database']);
		if (!$_sqllink)
			echo "<font color='#fa702c'>Error with mysql configuration. </font>";
		else
			{
			//Create & put file config with serilize data
			file_put_contents($_confFile, serialize($_POST));
			if (@$_POST['insert_sql'] == 1)
				{
					$_sql_insert = file_get_contents('install.sql');
					mysqli_multi_query($_sqllink, $_sql_insert);
				}

			exit("Configuration complete. Your bbframe administrator is user <u>admin</u> with password <b>bbframe</b>. <a href=".$_POST['basepath'].">Continue</a> or check <a href='".$_POST['basepath']."/install/'>conf</a>");
			}

	}


			$_addform = "<div style='width:200px;padding:5px;border:1px solid #005050;'>";
			$_addform .= "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
			$_addform .= "<div style='background:#005050; color:#fff; padding:3px;margin:3px; text-align:center'>bbFrame Configuration:</div>";
			$_addform .= "Mysql hostname:<br /><input type='text' name='hostname' value='localhost' size='30' /><br />";
			$_addform .= "Mysql username:<br /><input type='text' name='username' value='root' size='30' /><br />";
			$_addform .= "Mysql password:<br /><input type='text' name='password' value='' size='30' /><br />";
			$_addform .= "Mysql database:<br /><input type='text' name='database' value='bbframe2' size='30' /><br />";
			$_addform .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' name='insert_sql' id='insert_sql' value='1'>&nbsp;<small><label for='insert_sql'>Insert SQL.</label></small><br /><br />";
			$_addform .= "bbFrame URL:<br /><input type='text' name='basepath' value='http://localhost/bbframe' size='30' /><br />";
			$_addform .= "<input type='submit' value='Finish' />";
			$_addform .= "</div>";

	echo $_addform;
}
?>