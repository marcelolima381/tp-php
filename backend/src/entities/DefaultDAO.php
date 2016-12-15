<?php

namespace Entity;

	interface DefaultDAO{

		public function insert($object);
		public function update($object);
		public function delete($object);
		public function deleteAll();
		public function getById($object);
		public function getByIdReduzido($object);
		public function getAll();
		public function getAllReduzido();
	}