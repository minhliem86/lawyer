<?php
use services\Newsfeed\RepoInterface as Newsfeed;
class NewsfeedController extends BaseController{
	protected $newsfeed;

	public function __construct(Newsfeed $newsfeed){
		$this->newsfeed = $newsfeed;
	}

	public function index(){
		$newsfeed = $this->newsfeed->paginate(8);
		return View::make('pages.newsfeed')->with(compact('newsfeed'));
	}

	public function show($slug){
		$newsfeed = $this->newsfeed->showSlug($slug);
		$id = $this->newsfeed->showSlug($slug)->id;
		if(null !== $newsfeed){
			$relate = $this->newsfeed->takeLimit($id,8,0);
			return View::make('pages.newsfeed-detail')->with(compact('newsfeed','relate'));
		}else{
			return View::make('pages.404');
		}	
	}
}