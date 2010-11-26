<?php
require_once 'libs/smarty/Smarty.class.php';

class Template extends Smarty
{
	protected $_template;
	protected $_varsArray = array();


	public function __construct()
	{
		///smarty config	
		$this->template_dir = ROOT.DS.'application/views';
		$this->compile_dir = ROOT.DS.'cache/smarty_configs';
		$this->cache_dir = ROOT.DS.'cache/smarty_c';
		$this->config_dir = ROOT.DS.'cache/views_c';
	}

	public function setTemplate ($_tmpName)
	{
		$this->_template = $_tmpName;
	}

	public function setVariable ($_varsName, $_varsValue)
	{
		$this->_varsArray[$_varsName] = $_varsValue;
	}

	public function render()
	{
		$this->_template = ($this->_template) ? $this->_template : "index.html";

		foreach ($this->_varsArray as $_key=>$_value)
		{
			$this->assign($_key, $_value);
		}
		$this->assign('includeCSS','<link href="'.BASE_PATH.'/include/style.css" rel="stylesheet" type="text/css" />');
		$this->assign('includeJS','<script type="text/javascript" src="'.BASE_PATH.'/libs/ckeditor/ckeditor.js"></script>');
		$this->display('header.html');
		$this->display($this->_template);
		$this->display('footer.html');
	}
}