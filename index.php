<?php
//error_reporting(E_ALL | E_STRICT);
session_start();
setlocale(LC_ALL, 'hu_HU');
/*
 * autoloading function
 * if PHP version > 5.1.2 uses SPL
 */
$classes = 'classes';
// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

define('SYSPATH', realpath($classes).DIRECTORY_SEPARATOR);

/**
 * Set the default language
 */
$language = 'hu'; //eg. hu,en
if(!isset($_SESSION['lang']) && !isset($_COOKIE['lang'])){
	I18n::setDefaultSet($language);
}
if(isset($_GET['lang'])){
	I18n::lang($_GET['lang']);
}

function __autoload($classname) {
	$config = array(
		'classpath' => 'classes',
		'controllerpath' => 'controller',
	);
	if(version_compare(phpversion(), '5.1.2') >= 0){
		spl_autoload_extensions('.php,.class.php');
		set_include_path(get_include_path().','.
				PATH_SEPARATOR.$config['classpath'].PATH_SEPARATOR.','
				.PATH_SEPARATOR.$config['controllerpath'].PATH_SEPARATOR);
		spl_autoload($classname);
	} else {
		try {
			if(file_exists(strtolower($config['controllerpath'].PATH_SEPARATOR.$classname).".php")){
				include_once($config['controllerpath'].PATH_SEPARATOR.$classname.".php");
			} elseif(file_exists($config['classpath'].PATH_SEPARATOR.strtolower($classname).".class.php")){
				include_once($config['classpath'].PATH_SEPARATOR.strtolower($classname).".class.php");
			} else {
				throw new Load_Exception;
			}
		} catch (Load_Exception $exc) {
			//echo $exc->getTraceAsString();
			header("HTTP/1.1 500 Internal Server Error");
		}
	}
}


try {
	list($controllerName, $functionName) = Functions::getRoute();
	if(file_exists(strtolower("controller/".$controllerName).".php")){
		$content = $controllerName::factory($controllerName, $functionName);
		echo Template::Factory()->get($content);
	} else {
		throw new Exception404;
	}
} catch (Exception404 $exc) {
	//echo $exc->getTraceAsString();
	header("HTTP/1.1 404 Page Not Found");
}


	
function __($str){
	return I18n::get($str);
}

class Load_Exception extends Exception{
}