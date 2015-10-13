<?php
use services\About\RepoInterface as About;
class AboutController extends BaseController{
	protected $about;

	public function __construct(About $about){
		$this->about = $about;
	}

	public function index(){
		// $about = Cache::rememberForever('about',function(){
		// 	return $this->about->select_first();
		// });
		$about = $this->about->select_first();
		return View::make('pages.about')->with(compact('about'));
	}
}