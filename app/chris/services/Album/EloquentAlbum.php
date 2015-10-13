<?php
namespace services\Album;

use Album;

class EloquentAlbum implements RepoInterface{
	protected $album;

	public function __construct(Album $album){
		$this->album=$album;
	}

	public function select_all(){
		return $this->album->all();
	}

	public function find($id){
		return $this->album->find($id);
	}

	public function remove($id){
		$this->album->destroy($id);
	}

	public function create($data){
		return $this->album->create($data);
	}

	public function orderbyFirst($column,$prop){
		return $this->album->OrderBy($column,$prop)->first();
	}

	public function sortAll($column,$prop){
		return $this->album->OrderBy($column,$prop)->get();
	}

	public function deleteAll($column,$arr){
		return $this->album->whereIn($column,$arr)->delete();
	}

	public function  listbyid($id,$key,$val){
		return $this->find($id)->lists($key,$val);
	}

	public function lists($key,$val){
		return $this->album->lists($key,$val);
	}


	public function WhereOrderBy($columnWhere,$operate = '=',$value,$columnOrder,$valueOrder){
		return $this->album->where($columnWhere,$operate,$value)->Orderby($columnOrder,$valueOrder)->get();
	}

	public function whereFirst($column,$value, $operate = '='){
		return $this->album->where($column,$operate,$value)->first();
	}
}