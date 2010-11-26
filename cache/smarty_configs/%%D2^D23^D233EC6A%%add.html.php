<?php /* Smarty version 2.6.26, created on 2010-11-19 08:58:52
         compiled from add.html */ ?>


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
<br /><br />
	<form action="<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['addForm']; ?>
/add/" method="post" name='addArticle'>
	<input type='text' name="<?php echo $this->_tpl_vars['addForm']; ?>
Name" value="" size='100'><br /><br />
	<textarea name='<?php echo $this->_tpl_vars['addForm']; ?>
Description' id='description' row='5'>example text</textarea>
	
	<?php echo ' 
				<script type="text/javascript">
			//<![CDATA[
 
			CKEDITOR.replace( \'description\',
    			{
        		toolbar :
        		[
            	[\'Styles\', \'Format\'],
            	[\'Bold\', \'Italic\', \'-\', \'NumberedList\', \'BulletedList\', \'-\', \'Link\', \'-\', \'About\']
        		]
    });
 
			//]]>
			</script>
	'; ?>

	
	<input type='submit' value='add <?php echo $this->_tpl_vars['addForm']; ?>
'>
	</form>
<?php if (( isset ( $this->_tpl_vars['outArray'] ) )): ?>
<ul>
<?php $_from = $this->_tpl_vars['outArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
    <li><?php echo $this->_tpl_vars['k']; ?>
 - <?php echo $this->_tpl_vars['v']; ?>
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