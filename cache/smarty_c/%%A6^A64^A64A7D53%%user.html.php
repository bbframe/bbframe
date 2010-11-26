<?php /* Smarty version 2.6.26, created on 2010-11-09 23:20:30
         compiled from user.html */ ?>
<div id='center_top'>
<div style='float:left;'>
<div class='left_block' id='user'>
<?php if (( $this->_tpl_vars['isLogged'] )): ?>
<?php echo $this->_tpl_vars['userId']; ?>
. Hello 
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
	UserS:<br />
	<input type='text' name="user" value="" /><br />
	<input type='password' name="pass" value="" /><br />
	<input type='submit' value='LOG IN' style='padding:0px; margin:0px; border:1px solid;' />
	</form>
	
	
<?php endif; ?>

</div></div>

<div class='right_block'>
	Requirement: WAM P(5+)<br />
	<ul style='list-style-type:none;'>
	<li>&nbsp;Session Handler</li>
	<li>&nbsp;Data Access Layer(DAL)</li>
	<li>SCRUD pattern</li>
	<li>&nbsp;MVC design</li>
	<li>CKEditor 3.0(WYSIWYG)</li>
	<li>&nbsp;Smarty <?php echo '2.6.26'; ?>
</li>
	<?php if (isset ( $this->_tpl_vars['modelMess'] )): ?><li><?php echo $this->_tpl_vars['modelMess']; ?>
</li><?php endif; ?>
	</ul>
	<?php echo $this->_tpl_vars['template']; ?>

</div>

<div class='center_center'>
<h3>PageName:&nbsp;<?php echo $this->_tpl_vars['pageName']; ?>
</h3>
	<form action="<?php echo @BASE_PATH; ?>
/users/<?php echo $this->_tpl_vars['formUrl']; ?>
/" method="post" name='login'>

	<input type='text' name="user" value="" /><br />
	<input type='password' name="pass" value="" /><br />
	<input type='submit' value='reg/edit' style='padding:0px; margin:0px; border:1px solid;' />
	</form>
</div>
<div style='clear:both;'></div>
<br />


<?php if (( isset ( $this->_tpl_vars['outArray'] ) )): ?>
<ul>
<?php $_from = $this->_tpl_vars['outArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    <li><a href='<?php echo @BASE_PATH; ?>
/articles/one/<?php echo $this->_tpl_vars['v'][0]; ?>
/'><?php echo $this->_tpl_vars['v'][1]; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul> 
<?php endif; ?>
</div>
<div style='clear:right;'></div>
<br /><br />

<br />

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