<?php
class UsersController extends Controller
{
	public $userObj;
	private $subMenu_nologged = array('user'=>'users/index/','login'=>'users/login/','register'=>'users/register/');
	private $subMenu_logged = array('user'=>'users/index/', 'edit'=>'users/edit/', 'logout'=>'users/logout/', );


	public function preload ($smKey = 'user')
	{
		///use this like after parent __construct --
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
			$this->set('smKey', $smKey);
			$this->set('sub_menu',$this->subMenu_logged);
		}
		else
		{
			$this->set('isLogged',NULL);
			$this->set('smKey', $smKey);
			$this->set('sub_menu',$this->subMenu_nologged);
		}
	}

	public function index($_callback_var)
	{
		$this->preload();

		$this->set("pageName","User controller.");
		$this->set("pageDescription","List all active users...(call with method index)");
		$this->set("centerMessage","If not ".get_class($this->_model)."predifine template variable they have value from base controler(controler.class.php)");
		$this->set('outArray', $_POST);
		$this->set('mmId', 'user');
		$_result = $this->_model->selectAll();
		$this->set('outArray',$_result);
	}

	public function login()
	{
		if (!empty($_POST))
		{
			$this->userObj = new UserHandle();
			$this->userObj->login($_POST['user'], $_POST['pass']);
		}

		$this->preload('login');

		$this->set("pageName","Login Here.");
		$_more = "<ul><li>SEE other users comments</li><li>make comments</li><li>Post framework bugs</li><li>Vote for bbframe</li><li>and more...</li></ul>";
		$this->set("pageDescription","Register users can:".$_more);
	}

	public function one($_var)
	{
		$this->preload('one');

		$this->set("pageName","User with id.".$_var[0]." public profil.");
		
		$_result = $this->_model->select('userId',$_var[0]);
		
		
		$this->set("pageDescription","UserName:".$_result[0]['userName']."<br />Latest login:".date(DATE_RFC822, $_result[0]['lastLogin']));
	}


	public function logout()
	{

		$this->userObj = new UserHandle();
		$this->userObj->logout();

		//if (!$this->userObj->isLogged)
		//echo 'LOGOUT';

		$this->preload('logout');
	}

	public function register()
	{
		$this->preload('register');
		$this->setTemplate('register.html');

		if (!empty($_POST))
		{
			$this->userObj->register($_POST['username'], $_POST['password']);

			$this->userObj->login($_POST['username'], $_POST['username']);
				

			$this->set("pageName","Your registration finish successful.");
				
		}
		else
		{
			$this->set('formUrl','register');
			$this->set("pageName","Registration form.");
			//$this->set("pageDescription","Advantages for register users:");
		}
	}

	public function edit()
	{
		$this->preload('edit');
		$this->setTemplate('register.html');
			
		$this->set("pageName","Edit.");
	}
}
?>