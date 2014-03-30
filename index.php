<?php 
session_start();

/* comment these out for production */
error_reporting(E_ALL);
ini_set('display_errors', 1);


define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

require_once (ROOT . DS . 'config' . DS . 'main.php');

require_once( ROOT . DS . 'config' . DS . 'db.php');


require_once (ROOT . DS . 'library' . DS . 'shared.php');


/**
* Always call this last. It does the routing, so anything called after this will not be executed.
*/

require_once(ROOT . DS . 'library' . DS . 'bootstrap.php');