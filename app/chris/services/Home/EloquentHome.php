<?php 
namespace services\Home;

use Home;


class EloquentHome implements RepoInterface{
	private $home;

	public function __construct(Home $home){
		$this->home = $home;
	}

	public function select_first(){
		return $this->home->first();
	}

	public function  save(){
		$this->home->save();
	}
	public function create($data){
		$this->home->create($data);
	}
}