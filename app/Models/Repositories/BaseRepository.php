<?php

namespace App\Models\Repositories;

class BaseRepository 
{
	protected $entity;

	public function setEntity($entity)
	{
		$this->entity = $entity;
		return $this;
	}

	public function getEntity()
	{
		return $this->entity;
	}
}