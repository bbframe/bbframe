<?php
define ('DEVELOPMENT',true);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));


$_confFile = 'include/config.inc.bbf';
if (file_exists($_confFile))
{
	$_filedata = file_get_contents($_confFile);
	$_configs = unserialize($_filedata);
	define('BASE_PATH', $_configs['basepath']);
}
else 
{
	exit("You should install framework first. Begin from <a href='install/'>Here</a>");
}
//require_once 'include/config.inc.php';

require_once 'include/routing.inc.php';



if (DEVELOPMENT == true)
{
	error_reporting(E_ALL);
	ini_set('display_errors','On');
}
else
{
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	//ini_set('log_errors', 'On');
	//ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}

$url = @$_GET['url'];

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                   unset($GLOBALS[$key]);
               }
           }
       }
   }
}

function routeURL($url) {
	global $routing;

	foreach ( $routing as $pattern => $result ) {
		if ( preg_match( $pattern, $url ) ) {
			return preg_replace( $pattern, $result, $url );
		}
	}
	return ($url);
}

function callHook() {
	global $url;
	global $default;

	$urlArray = array();
	$urlArray = explode("/",$url);

	if (!isset($url))
	{
		$controller = $default['controller'];
		$controllerName = ucfirst($controller);
		$model = $default['model'];
		$template = $default['template'];
		$action = $default['action'];
		$queryString = 'index';
	}
	else
	{
		$controller = $urlArray[0];
		array_shift($urlArray);
		$action = ($urlArray[0]) ? $urlArray[0] : 'index';
		array_shift($urlArray);
		$queryString = $urlArray;

		$controllerName = $controller;
		$controller = ucwords($controller);
		$model = rtrim($controller, 's');
		$controller .= 'Controller';
		//$dispatch = new $controller($model,$controllerName,$action);
	}

	//echo $controller;
	//echo "new ".$controller. " (".$model.",".$controllerName.",".$action.")<br />";
	
	$dispatch = new $controller($model,$controllerName,$action);
	
	
	if ((int)method_exists($controller, $action) && is_object($dispatch)) {
		//echo $controller."-". $action . "-" . $queryString."<br />";
		call_user_func_array(array($dispatch,$action),array($queryString));
	} else {
		echo "Problem with method loading core.inc.php";
	}
}




function __autoload($className) {
	if (file_exists(ROOT . DS . 'include' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'include' . DS . strtolower($className) . '.class.php');
		//echo "<br />Include ".strtolower($className).".class.php<br />";
	}
	else if (file_exists(ROOT . DS . 'libs' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'libs' . DS . strtolower($className) . '.class.php');
		//echo "<br />Include ".strtolower($className).".class.php<br />";
	}
	else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		//echo "<br />Include ".strtolower($className).".php";
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
		echo "can not find the files...".ROOT.DS.$className;
	}
}

unregisterGlobals();
callHook();
?>