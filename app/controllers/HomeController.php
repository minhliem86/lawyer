<?php
use services\Home\RepoInterface as Home;

class HomeController extends BaseController {
	protected $home;

	public function __construct(Home $home){
		$this->home =$home;
	}
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function index(){
		$home = $this->home->select_first();
		return View::make('pages.index')->with(compact('home'));
	}

}