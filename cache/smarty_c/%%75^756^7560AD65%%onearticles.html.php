<?php /* Smarty version 2.6.26, created on 2010-10-26 14:46:59
         compiled from onearticles.html */ ?>
<div id='center_top'>
<div class='left_block' id='user'>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post" name='login'>
	UserS:<br />
	<input type='text' name="user" value=""><br />
	<input type='password' name="pass" value=""><br />
	<input type='submit' value='log'>
	</form>
</div>
<div class='right_block'>
	Requirement: WAM P(5+)<br />
	<ul style='list-style-type:none;'>
	<li>&nbsp;DBLayer</li>
	<li>&nbsp;Session Handler</li>
	<li>&nbsp;<?php echo '2.6.26'; ?>
</li>
	<li><?php echo $this->_tpl_vars['modelMess']; ?>
</li>
	</ul>
	<?php echo $this->_tpl_vars['template']; ?>

</div>

<div class='center_center'>
<h3>PageName:&nbsp;<?php echo $this->_tpl_vars['pageName']; ?>
</h3>
&nbsp;<?php echo $this->_tpl_vars['pageDescription']; ?>

</div>
<div style='clear:both;'></div>
<br />
centerMessage: <?php echo $this->_tpl_vars['centerMessage']; ?>


</div>
<div style='clear:right;'></div>

<?php if (( isset ( $this->_tpl_vars['outArray'] ) )): ?>
<ul>
<?php $_from = $this->_tpl_vars['outArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    <li><?php echo $this->_tpl_vars['k']; ?>
 - <?php echo $this->_tpl_vars['v']['article_title']; ?>
 <br /> <?php echo $this->_tpl_vars['v']['article_description']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul> 
<?php endif; ?>
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