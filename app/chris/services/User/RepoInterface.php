<?php

namespace services\User;

interface RepoInterface{
	public function select_all();

	public function find($id);

	public function removeID($id);

	public function create($data);

	public function whereFirst($column,$con);

	public function whereAll($column,$con);

	public function assignedRole($name);
}