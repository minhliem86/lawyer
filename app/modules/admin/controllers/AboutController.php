<?php
namespace admin\controllers;

use services\About\RepoInterface as About;

class AboutController extends \BaseController{
	protected $about;

	public function __construct(About $about){
		$this->about = $about;
	}

	public function getIndex(){
		$data = $this->about->select_first();
		return \View::make('admin::pages.about.view')->with(compact('data'));
	}

	public function postSave(){
		$data = $this->about->select_first();
		$data->slogan = \Input::get('slogan');
		$data->title = \Input::get('title');
		$data->content = \Input::get('content');
		$data->save();
		return \Redirect::route('about')->with('success','Updated !');
	}
}