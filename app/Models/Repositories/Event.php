<?php

namespace App\Models\Repositories;

use App\Models\Entities\EventPost as EventPostEntity;

class Event extends BaseRepository
{

	protected $eventPostEntity = null;

	protected $defaultGetParams = [
		'result' => 'list',
		'order' => [
			'orderBy' => 'created_at',
			'order' => 'DESC'
		]
	];

	public function __construct(EventPostEntity $eventPostEntity)
	{
		$this->eventPostEntity = $eventPostEntity;
	}

	protected function resetEventPostInstance()
	{
		$this->eventPostEntity = new EventPostEntity;
	}

	public function get($params = [])
	{

		$params = array_merge($this->defaultGetParams, $params);

		$eventPostEntity = $this->eventPostEntity;

		$eventPostEntity = $eventPostEntity
			->orderBy($params['order']['orderBy'], $params['order']['order']);

		switch($params['result']){
			case 'queryBuilder':
				return $eventPostEntity;
			break;
			case 'list':
				return $eventPostEntity->get();
			break;
			default:
				return $eventPostEntity->first();
			break;
		}
	}

	public function getById($event_id = null)
	{
		return $this->eventPostEntity->find($event_id);
	}

	public function getByIdAndByOwner($event_id = null, $owner_id = null)
	{
		$getParams = [
			'result' => 'queryBuilder'
		];

		return $this
					->get($getParams)
					->where('created_by', $owner_id)
					->where('id', $event_id)
					->first();
	}

	public function getAllByOwner($owner_id = null)
	{
		$getParams = [
			'result' => 'queryBuilder'
		];

		return $this->get($getParams)->where('created_by', $owner_id)->get();
	}
	
}
