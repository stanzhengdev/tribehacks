<?php
/**
* The class for handles the rendering of views, and other app related actions
*
* The idea of the function _set and _get to pass variables to the view are from this article
* http://coding.smashingmagazine.com/2011/10/17/getting-started-with-php-templating/
* 
* 
*/

class App {

	protected $views_dir = "application/view/";
	protected $vars = array();



	/**
	* Takes the name of a controller and returns the real class name for this controller
	* @param string The name of the controller
	* @return string the name of the class for the controller
	*/
	public static function getControllerClassName($name)
	{
		return "Controller_" . ucfirst($name);

	}

	/**
	* Takes the name of a view, eg.: 'site/index' and renders it.
	* @param string the name of the view
	*/
	public function render($view)
	{
		if(file_exists($this->views_dir.$view.".php"))
		{
			include ($this->views_dir.$view.".php");
		}
		else{
			throw new Exception($this->views_dir.$view.'.php does not exist.');
		}
	}

	public function __set($name, $value)
	{
		$this->vars[$name] = $value;
	}

	public function __get($name)
	{
		return $this->vars[$name];
	}

	public function unsetReturnUrl()
	{
		if(isset ($_SESSION["return_url"]))
			unset($_SESSION["return_url"]);
	}


	public function setReturnUrl($url = "site/index")
	{
		$_SESSION["return_url"] = $url;
	}
};