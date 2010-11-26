<?php
interface bbframeController
{
	public function preload();
	public function index($_var);
	public function mainmenu($_var);
}

class AdminsController extends Controller implements bbframeController
{
	private $mmKey = 'home';
	protected $sub_menu = array('admin'=>'admins/index/','settings'=>'admins/settings/','main menu'=>'admins/mainmenu/');
	
	public function preload ($smKey = 'admin')
	{
		//$this->settingObj = new settingHandle();
		$this->set('mmKey', $this->mmKey); //main menu ID
		$this->set('smKey', $smKey);
	}

	public function index($_callback_var)
	{
		$this->preload();
		$this->set("pageName","Admin:");
		$this->set("pageDescription","Share you experience and bugs report with the framework.");
		//$this->set("centerMessage","DOWNLOAD PAGE");
		//$_result = $this->_model->selectAll();
		//$this->set('outArray',$_result);
	}
	
	public function settings($_var)
	{
		if (!empty($_POST))
		{
			$_update['setting_value']=$_POST['new_value'];
		$this->settingObj->update($_update, 1);
		}
		
		$this->preload('settings');

		
		
		
		$this->set("pageName","BBframe settings:");
		
			$_addform = "<div style='display:none;'>";
			$_addform .= "<form id='setting' method='post' action=''>";
			$_addform .= "<div style='background:#005050; color:#fff'>Setting bbframe_title:</div>";
			$_addform .= "<input type='hidden' name='setting_var' value='bbframe_title' size='30' />";
			$_addform .= "Old: ".$this->settingObj->get('bbframe_title')."<br />";
			$_addform .= "New: <input type='text' id='new_value' name='new_value' size='20'/><br />";
			$_addform .= "<input type='submit' value='Set' />";
			$_addform .= "</form></div>";
		
		$this->set("pageDescription","Change <a href='password'>Admin password</a>, <a href='#setting' id='addform'>Framework title</a>".$_addform);
	}
	
	public function mainmenu($_var)
	{
		if (!empty($_POST))
		{
			if ($_POST['keyId'] == 1)
			{
				$_update['setting_value']=$_POST['new_value'];
				$this->settingObj->update($_update, 2);
			}
			if ($_POST['keyId'] == 2)
			{
				$_update['setting_value']=$_POST['new_value'];
				$this->settingObj->update($_update, 3);
			}
		}
		$this->preload('main menu');
		$this->set("pageName","Maim menu administration:");
		$_pureHTML = "1.". $this->settingObj->get('bbframe_mmKey1')." <a href='#setting1' class='addform'>EDIT</a><br />";
		$_pureHTML .= "2.". $this->settingObj->get('bbframe_mmKey2')." <a href='#setting2' class='addform'>EDIT</a><br />";
		
			$_addform = "<div style='display:none;'>";
			$_addform .= "<form id='setting1' method='post' action=''>";
			$_addform .= "<div style='background:#005050; color:#fff'>Setting Main menu:</div>";
			$_addform .= "<input type='hidden' name='keyId' value='1' size='30' />";
			$_addform .= "New: <input type='text' id='new_value' name='new_value' value='".$this->settingObj->get('bbframe_mmKey1')."' size='20'/><br />";
			$_addform .= "<input type='submit' value='Set' />";
			$_addform .= "</form></div><div style='display:none;'>";
			$_addform .= "<form id='setting2' method='post' action=''>";
			$_addform .= "<div style='background:#005050; color:#fff'>Setting Main menu:</div>";
			$_addform .= "<input type='hidden' name='keyId' value='2' size='30' />";
			$_addform .= "New: <input type='text' id='new_value' name='new_value' value='".$this->settingObj->get('bbframe_mmKey2')."' size='20'/><br />";
			$_addform .= "<input type='submit' value='Set' />";
			$_addform .= "</form></div>";
		
		$this->set("pageDescription","When you add new module it automaticaly appear at the main menu.<br />".$_addform.$_pureHTML);
	}
}
?>