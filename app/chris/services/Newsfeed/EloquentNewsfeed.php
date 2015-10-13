<?php 
namespace services\Newsfeed;

use Newsfeed;


class EloquentNewsfeed implements RepoInterface{
	private $news;

	public function __construct(Newsfeed $news){
		$this->news = $news;
	}

	public function select_all(){
		return $this->news->all();
	}

	public function find($id){
		return $this->news->find($id);
	}

	public function delete($id){
		$this->news->destroy($id);
	}

	public function deleteAll($column,$data){
		$this->news->whereIn($column,$data)->delete();
	}

	public function create($data){
		$this->news->create($data);
	}

	public function whereFirst($column,$con){
		return $this->news->where($colum,$con)->first();
	}

	public function whereAll($column, $con){
		return $this->news->where($column,$con)->get();
	}

	public function WhereOrderFirst($where,$valueWhere,$order_column,$order){
		return $this->news->where($where,$valueWhere)->Orderby($order_column,$oder)->first();
	}

	public function OderFirst($order_column,$order){
		return $this->news->OrderBy($order_column,$order)->first();
	}

	// FRONTEND
	public function paginate($num){
		return $this->news->where('show', 1)->paginate($num);
	}

	public function showSlug($slug){
		return $this->news->where('slug',$slug)->where('show',1)->first();
	}

	public function takeLimit($id, $take,$offset){
		return $this->news->where('id','<',$id)->orderby('id','DESC')->take($take)->offset($offset)->get();
	}
}