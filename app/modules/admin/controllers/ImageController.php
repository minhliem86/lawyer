<?php
namespace admin\controllers;

use services\Image\RepoInterface as Hinhanh;
use services\Album\RepoInterface as Album;

class ImageController extends \BaseController{
	public $image;
	public $album;
	public $path_thumb = 'public/backend/upload/thumb_me/images/';


	public function __construct(Hinhanh $image, Album $album ){
		$this->image=$image;
		$this->album=$album;
	}
	// INDEX
	public function getImage(){
		$image = $this->image->select_all();
		$album = $this->album->select_all();
		// print_r($image);
		return \View::make('admin::pages.image.index')->with(compact('image','album'));
	}

	// CREATE
	public function getImageAdd(){
		$album = $this->album->lists('title','id');
		return  \View::make('admin::pages.image.create')->with(compact('album'));
	}

	public function postImageAdd(){
		$get = \Input::get('img');
		$title_arr = \Input::get('title');
		$i = 1;
		foreach($get as $k => $value){		
			$sort = $this->image->orderFirstWhere('album_id',\Input::get('album_id'),'sort','DESC');
			if(!isset($sort) && $i == 1){
				$current = 1;
			}elseif( !isset($sort) && $i != 1){
				$current = $i;
			}
			if(isset($sort)){
				$current = $sort->sort + $i;
			}

			$urlhinh_orgi = $value;
			$urlhinh = str_replace('/lawyer-project', '', $urlhinh_orgi);
			$url_thumb = str_replace('/lawyer-project/', '', $urlhinh_orgi);

			$thumb = explode('/',$urlhinh_orgi);
			$name_thumb = end($thumb);
			$thumb_img = \Image::make($url_thumb)->resize(250,158)->save($this->path_thumb.time().'_thumb_'.$name_thumb);

			$data[] = array (
				'title'=> $title_arr[$k],
				'urlhinh'=> $urlhinh,
				'urlthumb'=> $this->path_thumb.time().'_thumb_'.$name_thumb,
				'show'=>1,
				'album_id'=>\Input::get('album_id'),
				'sort'=>$current
			);
			$i++;
		}
		
		$this->image->insertMulti($data);
		$album = $this->album->whereFirst('id','=',\Input::get('album_id'));
		return \Redirect::route('admin_image_album',$album->slug)->with('success','Successful');
	}

	// UPDATE
	public function getImageEdit($id){
		$image = $this->image->find($id);
		$album = $this->album->lists('title','id');
		return  \View::make('admin::pages.image.view')->with(compact('image','album'));
	}
	public function postImageEdit($id){
		if(\Input::get('file')){
			$urlhinh = \Input::get('file');
			$urlhinh = str_replace('/anhvanhe', '', $urlhinh);
			$data = array (
				'title'=> \Input::get('title'),
				'urlhinh'=> $urlhinh,
				'show'=>1,
				'album_id'=>\Input::get('album_id'),
				'sort'=>\Input::get('sort'),
			);
		}else{
			$urlhinh = \Input::get('file_bk');
			$data = array (
				'title'=> \Input::get('title'),
				'urlhinh'=> $urlhinh,
				'show'=>1,
				'album_id'=>\Input::get('album_id'),
				'sort'=>\Input::get('sort'),
			);
		}
		
		$query = $this->image->find($id);
		$query->update($data);
		return \Redirect::route('admin_getImage')->with('success','Successful');
	}

	// DELETE
	public function delete($id){
		$this->image->remove($id);
		return \Redirect::back()->with('success','Successful');
	}
	public function deleteAll(){
		$data = \Input::get('iddata');
		if(empty($data)){
			return \Redirect::back()->with('error','Please choose items to delete');
		}
		$this->image->deleteAll('id',$data);
		return \Redirect::back()->with('success','Successful');
	}

	//SHOW
	public function show(){
		if(\Request::ajax()){
			$show = \Input::get('anhien');
			$id = \Input::get('id');
			$data = $this->image->find($id);
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

	// IMAGE FOLLOW ALBUM
	public function Image_album($slug_album){
		$album = $this->album->select_all();
		$type_album = $this->album->whereFirst('slug','=',$slug_album);
		$image = $this->image->where('album_id','=',$type_album->id);
		// print_r($image);
		return \View::make('admin::pages.image.image_follow_album')->with(compact('album','image'));
	}



	// CAP NHAT VI TRI
	public function vitriAlbum(){
		$vitri = \Input::get('vitri');
		foreach ($vitri as $k=>$item){
			$image = \Album::find($k);
			$image->thutu = $item;
			$image->save();
		}
		return \Redirect::route('admin_getAlbum')->with('title','Album')->with('success','Cập nhật thành công');
	}
}