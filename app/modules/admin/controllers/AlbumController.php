<?php
namespace admin\controllers;

use services\Album\RepoInterface as Album;

class AlbumController extends \BaseController{
	public $album;

	public function __construct(Album $album){
		$this->album=$album;
	}

	public function getAlbum(){
		$album = $this->album->sortAll('sort','ASC');
		return \View::make('admin::pages.album.index')->with(compact('album'));
	}


	// CREATE
	public function addAlbum(){
		return \View::make('admin::pages.album.create');
	}
	public function post_addAlbum(){
		$sort = $this->album->orderbyFirst('sort','DESC');
		if(!isset($sort)){
			$current = 1;
		}else{
			$current = $sort->sort + 1;
		}
		$urlhinh = \Input::get('file');
		$urlhinh = str_replace('/anhvanhe', '', $urlhinh);
		$data = array (
			'title'=> \Input::get('title'),
			'slug' => \Unicode::make(\Input::get('title')),
			'urlhinh'=> $urlhinh,
			'show'=>1,
			'sort'=>$current
		);
		$this->album->create($data);
		return \Redirect::route('admin_getAlbum')->with('success','Successful');
	}

	// UPDATE
	public function editAlbum($id){
		$album = $this->album->find($id);
		return \View::make('admin::pages.album.view')->with(compact('album'));
	}
	public function post_editAlbum($id){
		if(\Input::get('file')){
			$urlhinh = \Input::get('file');
			$urlhinh = str_replace('/anhvanhe', '', $urlhinh);
			$data = array (
				'title'=> \Input::get('title'),
				'slug' => \Unicode::make(\Input::get('title')),
				'urlhinh'=> $urlhinh,
				'show'=>\Input::get('show'),
				'sort'=>\Input::get('sort'),
			);
		}else{
			$data = array (
				'title'=> \Input::get('title'),
				'slug' => \Unicode::make(\Input::get('title')),
				'urlhinh'=> \Input::get('imgbk'),
				'show'=>\Input::get('show'),
				'sort'=>\Input::get('sort'),
			);
		}
		
		$query = $this->album->find($id);
		$query->update($data);
		return \Redirect::route('admin_getAlbum')->with('success','Successful');
	}

	//DELETE
	public function deleteAlbum($id){
		$this->album->remove($id);
		return \Redirect::route('admin_getAlbum')->with('success','Successful');
	}
	public function deleteAll(){
		$data = \Input::get('iddata');
		$this->album->deleteAll('id',$data);
		return \Redirect::back()->with('success','Successful');
	}


	// SHOW
	public function show(){
		if(\Request::ajax()){
			$show = \Input::get('anhien');
			$id = \Input::get('id');
			$data = $this->album->find($id);
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

	// CAP NHAT VI TRI
	public function vitriAlbum(){
		$vitri = \Input::get('vitri');
		foreach ($vitri as $k=>$item){
			$album = \Album::find($k);
			$album->thutu = $item;
			$album->save();
		}
		return \Redirect::route('admin_getAlbum')->with('title','Album')->with('success','Cập nhật thành công');
	}

}