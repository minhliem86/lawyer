<?php
namespace admin\controllers;

use services\Service\RepoInterface as Service;

class ServicesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $service;

	public function __construct(Service $service){
		$this->service = $service;
	}

	public function index()
	{
		$data = $this->service->select_all();
		return \View::make('admin::pages.service.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('admin::pages.service.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$sort = $this->service->OderFirst('order','DESC');
		if(!isset($sort)){
			$current = 1;
		}else{
			$current = $sort->order + 1;
		}
		if(null !== \Input::file('img')){
			$hinh = \Input::all();
			$img = $hinh['img'];
			
			$name = $img->getClientOriginalName();
			$path = "public/upload/img";
			$urlHinh = $path.'/'.$name;
			$img->move($path,$name);

			$height = \Image::make($urlHinh)->height();
			if($height>150){
				$resize_img = \Image::make($urlHinh)->resize(250,150,function($constraint){$constraint->aspectRatio();})->save($path.'/'.$name);
			};
		}else{
			$urlHinh = '';
		}
		$slug = \Unicode::make(\Input::get("title"));
		$data = array(
			'title'=>\Input::get('title'),
			'slug' => $slug,
			'content'=>\Input::get('content'),
			'urlHinh'=>$urlHinh,
			'show'=>\Input::get('show'),
			'order'=>$current,
		);
		$this->service->create($data);

		return \Redirect::route('admin.service.index')->with('success','Created !');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = $this->service->find($id);
		return \View::make('admin::pages.service.view')->with(compact('data'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = $this->service->find($id);
		return \View::make('admin::pages.service.view')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(null !== (\Input::file('img'))){
			$hinh = \Input::all();
			$img = $hinh['img'];
			
			$name = $img->getClientOriginalName();
			$path = "public/upload/img";
			$urlHinh = $path.'/'.$name;
			$img->move($path,$name);

			$height = \Image::make($urlHinh)->height();
			if($height>150){
				$resize_img = \Image::make($urlHinh)->resize(250,150,function($constraint){$constraint->aspectRatio();})->save($path.'/'.$name);
			};

		}else{
			$urlHinh = \Input::get('img_bk');
		}

		$data= $this->service->find($id);
		$data->title = \Input::get('title');
		$data->slug = \Unicode::make(\Input::get('title'));
		$data->content = \Input::get('content');
		$data->urlHinh = $urlHinh;
		$data->show = \Input::get('show');
		$data->order = \Input::get('order');
		$data->save(); 

		return \Redirect::route('admin.service.index')->with('success','Updated !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function DeleteAll(){
		if(\Input::has('iddata')){
			$this->service->deleteAll('id',\Input::get('iddata'));
			return \Redirect::back()->with('success','Deleted !');
		}else{
			return \Redirect::back()->with('error','Please choose items want to delete !');
		}
	}

	public function delete($id){
		$this->service->delete($id);
		return \Redirect::route('admin.service.index')->with('success','Deleted !');
	}

	public function visible(){
		if(\Request::ajax()){
			$show = \Input::get('anhien');
			$id = \Input::get('id');
			$data = $this->service->find($id);
			if($show == 1){
				$data->show = 0;
				$data->save();
			}else{
				$data->show = 1;
				$data->save();
			}
			return \Response::json(array('kq'=>$show));
		}else{
			return \Reponse::json('500', 'Error Request');
		}
	}


}
