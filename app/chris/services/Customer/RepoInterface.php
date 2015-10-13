<?php

namespace services\Customer;

interface RepoInterface{
	public function select_all();

	public function find($id);

	public function delete($id);

	public function deleteAll($column,$data);

	public function create($data);

	public function whereFirst($column,$con);

	public function whereAll($column,$con);
}