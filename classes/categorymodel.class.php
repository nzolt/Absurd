<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Data Model for Categorys
 */
class categoryModel extends Model {
	/**
	 * MySQL table name
	 * @var string 
	 */
	protected $_table = 'category';

	public function getAssigned(){
		if(is_array($this->values)){
			$category[] = array();
			foreach ($this->values as $key => $value) {
				$category[] = $value["categoryid"];
			}
		}
		return $category;
	}
	
}
