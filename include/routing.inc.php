<?php
$routing = array(
	'/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3'
);

$default['controller'] = 'controller';
$default['model'] = 'model';
$default['template'] = 'template';
$default['action'] = 'index';
?>