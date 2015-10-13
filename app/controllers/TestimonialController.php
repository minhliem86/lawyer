<?php
use services\Testi\RepoInterface as Testi;
class TestimonialController extends BaseController{
	protected $testi;

	public function __construct(Testi $testi){
		$this->testi = $testi;
	}

	public function index(){
		$testi = $this->testi->paginate(8);
		return View::make('pages.testimonial')->with(compact('testi'));
	}

	public function show($slug){
		$testi = $this->testi->showSlug($slug);
		$id = $this->testi->showSlug($slug)->id;
		if(null !== $testi){
			$relate = $this->testi->takeLimit($id,6,0);
			return View::make('pages.testimonial-detail')->with(compact('testi','relate'));
		}else{
			return View::make('pages.404');
		}	
	}
}