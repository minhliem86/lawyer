<?php
namespace admin\controllers;

use services\Home\RepoInterface as Home;

class HomeController extends \BaseController{
	protected $home;

	public function __construct(Home $home){
		$this->home = $home;
	}

	public function getIndex(){
		$data = $this->home->select_first();
		return \View::make('admin::pages.home.view')->with(compact('data'));
	}

	public function postSave(){
		$data = $this->home->select_first();
		if(count($data) != 0){
			$data->title = \Input::get('title');
			$data->slug = \Unicode::make(\Input::get('title'));
			$data->content = \Input::get('content');
			$data->show = 1;
			$data->save();
			
		}else{
			$input = array(
				'title'=> \Input::get('title'),
				'slug'=> \Unicode::make(\Input::get('title')),
				'content'=> \Input::get('content'),
				'show'=>1
			);
			$this->home->create($input);
		}

		return \Redirect::route('home')->with('success','Updated !');
	}
}