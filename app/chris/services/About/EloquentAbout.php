<?php 
namespace services\About;

use About;


class EloquentAbout implements RepoInterface{
	private $about;

	public function __construct(About $about){
		$this->about = $about;
	}

	public function select_first(){
		return $this->about->first();
	}

	public function  save(){
		$this->about->save();
	}
}