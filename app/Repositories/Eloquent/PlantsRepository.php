<?php
namespace App\Repositories\Eloquent;

use App\Plants;
use App\Repositories\Interfaces\PlantsInterface;

class PlantsRepository implements PlantsInterface{
    
	private $model;

	public function __construct(Plants $model)
	{
		$this->model = $model;
	}

    public function create(array $args)
    {
        return $this->model->create($args);
    }
}