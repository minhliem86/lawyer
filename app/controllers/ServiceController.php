<?php
use services\Service\RepoInterface as Service;
class ServiceController extends BaseController{
	protected $service;

	public function __construct(Service $service){
		$this->service = $service;
	}

	public function index(){
		$service = $this->service->paginate(8);
		return View::make('pages.service')->with(compact('service'));
	}

	public function show($slug){
		// $service = Cache::rememberForever('service', function() use($slug) {
		// 	return $this->service->showSlug($slug);
		// });
		$service = $this->service->showSlug($slug);
		$id = $this->service->showSlug($slug)->id;
		if(null !== $service){
			$relate = $this->service->takeLimit($id,4,0);
			return View::make('pages.service-detail')->with(compact('service','relate'));
		}else{
			return View::make('pages.404');
		}
		
		

		
	}
}