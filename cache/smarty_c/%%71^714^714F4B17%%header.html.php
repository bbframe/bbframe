<?php /* Smarty version 2.6.26, created on 2010-11-18 12:13:00
         compiled from header.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $this->_tpl_vars['pageTitle']; ?>
</title>
<?php echo $this->_tpl_vars['includeCSS']; ?>
 
<?php echo $this->_tpl_vars['includeJS']; ?>

<?php echo ' 
        <link rel="stylesheet" href="http://bbframe.com/include/slideshow.css" type="text/css" media="screen" />        
        <link rel="stylesheet" href="http://bbframe.com/include/jquery.fancybox-1.3.3.css" type="text/css" media="screen" /> 
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://bbframe.com/include/jquery.cycle.js"></script>
        <script type="text/javascript" src="http://bbframe.com/include/slideshow.js"></script>
        <script type="text/javascript" src="http://bbframe.com/include/jquery.fancybox-1.3.3.pack.js"></script>
        <script type="text/javascript" src="http://bbframe.com/include/scripts.js"></script>

'; ?>

</head>
<body>
<div id='header'><span id='logo'>&nbsp;&lt;BBframe / work&gt;</span>

	<div id='main_menu'>

	<ul>
		<?php $_from = $this->_tpl_vars['main_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<?php if (( $this->_tpl_vars['k'] ) == ( $this->_tpl_vars['mmKey'] )): ?>
		<li><a href='<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['v']; ?>
' id='current'><?php echo $this->_tpl_vars['k']; ?>
</a></li>
		<?php else: ?>
		<li><a href='<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['v']; ?>
'><?php echo $this->_tpl_vars['k']; ?>
</a></li>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
		<div id='user_menu' style='float:right;color:#ccdcdc;font-size:14px;'>:: 
		<?php $_from = $this->_tpl_vars['user_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<a href='<?php echo @BASE_PATH; ?>
/users/<?php echo $this->_tpl_vars['v']; ?>
'><?php echo $this->_tpl_vars['k']; ?>
</a> :: 
		<?php endforeach; endif; unset($_from); ?>
</div>	
	</div>
	<div id='sub_menu'>
	<ul>
		<?php $_from = $this->_tpl_vars['sub_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<?php if (( $this->_tpl_vars['k'] ) == ( $this->_tpl_vars['smKey'] )): ?>
		<li><a href='<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['v']; ?>
' id='current'><?php echo $this->_tpl_vars['k']; ?>
</a></li>
		<?php else: ?>
		<li><a href='<?php echo @BASE_PATH; ?>
/<?php echo $this->_tpl_vars['v']; ?>
'><?php echo $this->_tpl_vars['k']; ?>
</a></li>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	</div>
</div>
<div style='clear:both;'></div>
<br />
<div id='center'>