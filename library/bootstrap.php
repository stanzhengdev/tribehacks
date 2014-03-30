<?php
if(!empty($_GET['r']))
	$url = htmlspecialchars($_GET['r']);
else
	$url = "survey/index";

$terms = array();
$terms = explode("/", $url, 2);

$class_name = App::getControllerClassName($terms[0]);

$action_name =  (count($terms) > 1) ?  $terms[1] : 'index';

if(class_exists($class_name))
{
	$class = new $class_name;
	if(method_exists($class, $action_name))
		$class->$action_name();
	else {
		ob_start();
		header("Location: ?r=survey/index"); 
		ob_end_flush();	
	}	
}
else{
	ob_start();
	header("Location: ?r=survey/index");
	ob_end_flush();
}
