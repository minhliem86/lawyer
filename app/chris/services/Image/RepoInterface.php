<?php
namespace services\Image;

interface RepoInterface {

	public function select_all();

	public function find($id);

	public function remove($id);

	public function create($data);

	public function insertMulti($data);

	public function orderbyFirst($column,$prop);

	public function orderFirstWhere($where,$valueWhere,$column,$prop);

	public function deleteAll($column,$arr);

	public function with($with);

	public function paginate($sl);

	public function getRand($limit);

	public function where($column,$operate = '=',$value);

}