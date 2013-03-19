<?php defined('SYSPATH') or die('No direct script access.');
/**
 * 
 */
class Site extends Controller{

	public function index(){
		return Template::Factory('default')->get(array('title'=>'Üdvözölön az oldalon!','message'=>'Kérem válasszon a menüből.'));
	}
	
	public function site(){
		return 'index/site';
	}
	
	public function listing(){
		return 'index/listing';
	}
}