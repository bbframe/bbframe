<?php
class Controller {
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_template;
	protected $_vars = array();
	protected $main_menu = array('home'=>'');
	protected $sub_menu = array('home'=>'','articles'=>'articles/', 'comments' => 'comments/');
	protected $user_menu = array('user'=>'index/','login'=>'login/','register'=>'register/');
	protected $user_menu_logged = array('user'=>'index/','edit'=>'edit/','logout'=>'logout/');
	public $userObj;
	protected $settingObj;
	private $mmKey = "home";

	private $exectime_start;

	public function preloadController ()
	{
		$this->settingObj = new settingHandle();
		
		
		$this->set("pageTitle", $this->settingObj->get('bbframe_title'));
		$this->main_menu[$this->settingObj->get('bbframe_mmKey1')] = 'articles/index/';
		$this->main_menu[$this->settingObj->get('bbframe_mmKey2')] = 'comments/index/';
		$this->set('mmKey', $this->mmKey);
		$this->set('smKey', 'home');
		$this->set("main_menu",$this->main_menu);
		$this->set("sub_menu",$this->sub_menu);

		if (empty($this->userObj))
		{
			$this->userObj = new UserHandle();
			$this->userObj->check();
		}

		if ($this->userObj->isLogged)
		{
			$this->set('isLogged',$this->userObj->isLogged);
			$this->set('userId',$this->userObj->userId);
			$this->set('userName',$this->userObj->userName);
			$this->set('user_menu',$this->user_menu_logged);
		}
		else
		{
			$this->set('isLogged',NULL);
			$this->set('user_menu',$this->user_menu);
		}
	}

	public function __construct($model, $controller, $action) {

		$this->exectime_start = microtime(true);
		 
		$this->_controller = $controller;
		$this->_action = $action;
		$this->_model = $model;
		$this->_model = new $model;
		$this->_template = new Template();

		$this->preloadController();///user login >>>


	}


	public function index ($_callback_var)
	{
		$this->preloadController();
		$this->set("pageName", "bbframe - Experimental MVC PHP framework.");
		$_desc = "Home page (include/controller.class.php method index)";
		
		$this->set("pageDescription", $_desc);

		$this->set('header',"Page call with object CONTROLER &amp; method INDEX(public function Index)");
	}
	 
	public function setTemplate ($_tmpName)
	{
		$this->_template->setTemplate($_tmpName);
	}
	 
	public function set($name,$value) {
		$this->_template->setVariable($name,$value);
	}
	public function textUrl ($_string)
	{
		///php5 power programing 
		
		$patterns = array('@[A-Z]@e', '@[\W]@', '@_+@');
		$replacements = array('strtolower(\\0)', '_', '_');
		return @preg_replace($patterns, $replacements, $_string);
	}

	public function __destruct() {
		
		$executionTime = microtime(true) - $this->exectime_start;
		$executionTime = number_format($executionTime, 5);

		$this->set('executionTime',$executionTime);
		
		$this->_template->render();
	}

}
?>
