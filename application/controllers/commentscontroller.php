<?php
interface bbframeController
{
	public function preload();
	public function index($_var);
	public function add($_var);
}

class CommentsController extends Controller implements bbframeController
{
	private $mmId = 'comment';
	protected $sub_menu = array('comment'=>'comments/index/','add comment'=>'comments/add/','one'=>'comments/one/');
	private $moduleName = 'comments';
	
	public function preload ($smKey = 'comment')
	{
		$this->set('mmKey', $this->settingObj->get('bbframe_mmKey2'));
		$this->set('smKey', $smKey);
	}

	public function index($_callback_var)
	{
		$this->preload();
		$this->set("pageName","Comments controller:");
		$_result = $this->_model->selectAll();
		$this->set('mmId', 'comment');
		$this->set('outArray',$_result);
	}
	public function add($_var)
	{
		if (!empty($_POST))
		{
		$_sqlArray['id'] = '';
		$_sqlArray[$this->mmId.'_title'] = $_POST[$this->moduleName.'Name'];
		$_sqlArray[$this->mmId.'_description'] = trim($_POST[$this->moduleName.'Description']);

		$this->_model->save($_sqlArray);
		} 

		$this->preload('add comment');
		// use the same template like article
		$this->setTemplate('addarticle.html');
		$this->set('addForm', $this->moduleName);
		
		$this->set("pageTitle","Add comment to mysite.");
		$this->set("pageName","Add comment form.");
		$this->set("pageDescription","Post new comment via addarticle.html template with integrate CKEditor.");

	}
	public function one($_article_title)
	{
		$this->preload('one');
		
		$_result = $this->_model->select('id',$_article_title[0]);
		$this->set('pageName',$_result[0]['comment_title']);
		$this->set('pageDescription',$_result[0]['comment_description']);
	}
}
?>