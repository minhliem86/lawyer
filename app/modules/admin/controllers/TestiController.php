<?php
namespace admin\controllers;

use services\Testi\RepoInterface as Testi;

class TestiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $testi;

	public function __construct(Testi $testi){
		$this->testi = $testi;
	}

	public function index()
	{
		$data = $this->testi->select_all();
		return \View::make('admin::pages.testi.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('admin::pages.testi.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$sort = $this->testi->OderFirst('order','DESC');
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
			'owner'=>\Input::get('owner'),
			'slug' => $slug,
			'content'=>\Input::get('content'),
			'urlHinh'=>$urlHinh,
			'show'=>\Input::get('show'),
			'order'=>$current,
		);
		$this->testi->create($data);

		return \Redirect::route('admin.testimonial.index')->with('success','Created !');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = $this->testi->find($id);
		return \View::make('admin::pages.testi.view')->with(compact('data'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = $this->testi->find($id);
		return \View::make('admin::pages.testi.view')->with(compact('data'));
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

		$data= $this->testi->find($id);
		$data->title = \Input::get('title');
		$data->slug = \Unicode::make(\Input::get('title'));
		$data->owner = \Input::get('owner');
		$data->content = \Input::get('content');
		$data->urlHinh = $urlHinh;
		$data->show = \Input::get('show');
		$data->order = \Input::get('order');
		$data->save(); 

		return \Redirect::route('admin.testimonial.index')->with('success','Updated !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function DeleteAll(){
		if(\Input::has('iddata')){
			$this->testi->deleteAll('id',\Input::get('iddata'));
			return \Redirect::back()->with('success','Deleted !');
		}else{
			return \Redirect::back()->with('error','Please choose items want to delete !');
		}
	}

	public function delete($id){
		$this->testi->delete($id);
		return \Redirect::route('admin.testimonial.index')->with('success','Deleted !');
	}

	public function visible(){
		if(\Request::ajax()){
			$show = \Input::get('anhien');
			$id = \Input::get('id');
			$data = $this->testi->find($id);
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
