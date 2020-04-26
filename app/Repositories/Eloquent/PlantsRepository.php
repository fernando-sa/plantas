<?php
namespace App\Repositories\Eloquent;

use App\Plant;
use App\Repositories\Interfaces\PlantsInterface;

class PlantsRepository implements PlantsInterface{
    
	private $model;

	public function __construct(Plant $model)
	{
		$this->model = $model;
	}

    public function create(array $args)
    {
        return $this->model->create($args);
    }
}