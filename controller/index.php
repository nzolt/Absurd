<?php

class Index extends Controller{

	public function index(){
		return 'index/index';
	}
	
	public function site(){
		return 'index/site';
	}
	
	public function listing(){
		return 'index/listing';
	}
}