<?php
class ArticlesController extends Controller
{
	protected $sub_menu = array('article'=>'articles/index/','add'=>'articles/add/','one'=>'articles/one/');
	  //public $_templateName;
	  public static $_tmpName;
	
	public function preload ($smKey = 'article')
	{
		$this->set('mmKey', $this->settingObj->get('bbframe_mmKey1'));
		$this->set('smKey', $smKey);
		
		
	}
	
	public function index($_callback_var)
	{
		$this->preload();
		$this->set('sub_menu',$this->sub_menu);
		$this->set('pageName','Article Controllers');
		$_result = $this->_model->selectAll();
		$this->set('mmId', 'article');
		$this->set('outArray',$_result);
	}
	
	public function add()
	{
		if (!empty($_POST))
		{
		$_sqlArray['id'] = '';
		$_sqlArray['article_title'] = $_POST['articlesName'];
		$_sqlArray['article_description'] = $_POST['articlesDescription'];
		$this->_model->save($_sqlArray);
		$this->set("pageName","Thank you for posting.");
		exit;
		}
		//////////add new template 
		$this->setTemplate('addarticle.html');
		$this->preload('add');
		$this->set("addForm","articles");
		
		$this->set("pageTitle","Add article to mysite.");
		$this->set("pageName","Add article.");
		$this->set("pageDescription","Post new article via addarticle.html template with integrate CKEditor.");

		$this->set('outArray',$_POST);
	}
	
	
	public function one($_article_title)
	{
		$this->preload('one');
		
		$_result = $this->_model->select('id',$_article_title[0]);
		$this->set('pageName',$_result[0]['article_title']);
		$this->set('pageDescription',$_result[0]['article_description']);
	}
}