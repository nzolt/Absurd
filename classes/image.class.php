<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 */
class Image {
	protected static $_name = 'Image';
	protected $_filename;
	public static $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
	public static $extension = array('image/gif'=>'.gif', 'image/jpeg'=>'.jpg', 'image/pjpeg'=>'.jpg', 'image/png'=>'.png');

	public function __construct() {
		return $this;
	}
	
	public static function Factory($file = NULL){
		$instance = new self::$_name();
		if($file !== NULL){
			$instance->_filename = $file;
		}
		return $instance;
	}
	
	public function upload(){
		$new_name = Functions::getMtHash().self::$extension[$_FILES['image']['type']];
		if (in_array($_FILES['image']['type'], self::$permitted) && $_FILES['image']['size'] > 0 ) {
			if (move_uploaded_file($_FILES['image']['tmp_name'], Config::factory('siteconfig.productImageForlder').$new_name)) {
				return $new_name;
			} else {
				return FALSE;
			}
		}
		return $image_name;
	}

	public function getPath(){
		return '../../'.Config::factory('siteconfig.productImageForlder').$this->_filename;
	}
	
	public function display(){
		return '<div id="imagedtl_div" name="imagedtl_div" align="center"><img class="imagethb" id="imagedtl" name="image" src="'.$this->getPath().'" alt=""></div>';
	}
}