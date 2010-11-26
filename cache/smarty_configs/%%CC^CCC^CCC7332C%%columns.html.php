<?php /* Smarty version 2.6.26, created on 2010-11-18 13:59:07
         compiled from columns.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'columns.html', 53, false),array('function', 'math', 'columns.html', 87, false),)), $this); ?>
<div id='center_top'>
<div style='float:left;'>
<div class='left_block' id='user'>
<?php if (( $this->_tpl_vars['isLogged'] )): ?>
(<?php echo $this->_tpl_vars['userId']; ?>
). Hello 
<a href='<?php echo @BASE_PATH; ?>
/users/one/<?php echo $this->_tpl_vars['userId']; ?>
'><?php echo $this->_tpl_vars['userName']; ?>
</a>
<br />
<a href='<?php echo @BASE_PATH; ?>
/users/logout/'>Logout</a>
<?php else: ?>
	
	
	
	<form action="<?php echo @BASE_PATH; ?>
/users/login/" method="post" name='login'>
	<input type='text' name="user" value="" /><br />
	<input type='password' name="pass" value="" /><br />
	<input type='submit' value='LOG IN' style='padding:0px; margin:0px; margin-top:5px; border:1px solid; width:110px; height:20px;' />
	</form>
	
	
<?php endif; ?>

</div>
<div style='clear:left;'><br /></div>
<!-- <div class='left_block'>
	a
	</div> -->
</div>

<div class='right'>
<div class='right_block'>
	<u>BBframe-work features:</u> 
	<ul style='list-style-type:none; padding:5px;'>
	<li>1. Easy installation</li>
	<li>2. Strong and robust core</li>
	<li>3. Quick development process</li>
	<li>4. Security  architecture</li>
	<li>5. High performance</li>
	</ul>
	<a href='#moreinfo' class='moreinfo' style='float:right;'>more details</a><br />
	<div style='width:200px;' id='morefeatures'>
	1. OO PHP 5 code<br />
	2. MVC design pattern<br />
	3. Custom session handler<br />
	4. DAL with SCRUD pattern<br />
	5. CKEditor, Smarty, Jquery integrated<br />
	6. 	Modular architecture
	</div>
</div></div>

<div class='center_center'>
<h3><?php echo $this->_tpl_vars['pageName']; ?>
</h3>
&nbsp;<?php echo $this->_tpl_vars['pageDescription']; ?>

<?php if (( count($this->_tpl_vars['outArray']) ) > 0): ?>
<div id='tags'>
<ul style='list-style-type:inline;'>
<?php $_from = $this->_tpl_vars['outArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    <li><a href='<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['listUrl']; ?>
/<?php echo $this->_tpl_vars['v'][2]; ?>
/'><?php echo $this->_tpl_vars['v'][1]; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul> 
<?php endif; ?>
</div>
</div>
<div style='clear:both;'></div>
<br />



</div>
<div style='clear:right;'></div>
<br />
<h3><?php echo $this->_tpl_vars['slideMessage']; ?>
</h3>

<!-- slider  -->
<?php if (( isset ( $this->_tpl_vars['slideArr'] ) )): ?>
<div id="slideshow">
	<div class="slides">
	<ul>
	<?php $_from = $this->_tpl_vars['slideArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<li id='slide<?php echo $this->_tpl_vars['k']; ?>
'><b><?php echo $this->_tpl_vars['v'][1]; ?>
</b><br ><p><?php echo $this->_tpl_vars['v'][2]; ?>
</p><br /></li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	</div>
		<div style='float:right;'><a href='#' style='color:#ccdcdc'>Pause</a></div>
	
	<ul class="slides-nav">
	<?php $_from = $this->_tpl_vars['slideArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<li><a href='#slide<?php echo $this->_tpl_vars['k']; ?>
'><?php echo smarty_function_math(array('equation' => "x + 1",'x' => $this->_tpl_vars['k']), $this);?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>

</div>
<?php endif; ?>



<?php if (( isset ( $this->_tpl_vars['subMenu'] ) )): ?>
SUBmenu : ->
<?php $_from = $this->_tpl_vars['subMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    <a href='<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['v']; ?>
'><?php echo $this->_tpl_vars['k']; ?>
</a> &nbsp;&nbsp;&nbsp; 
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>