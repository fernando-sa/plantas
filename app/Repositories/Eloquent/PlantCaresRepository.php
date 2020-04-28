<?php
namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;

use App\PlantCare as PlantCare;
use App\Http\Requests\PlantCare as PlantCareRequest;
use App\Repositories\Interfaces\PlantCaresInterface;
use App\Repositories\Interfaces\PlantsInterface;

class PlantCaresRepository implements PlantCaresInterface{

	private $model;

	public function __construct(PlantCare $model)
	{
		$this->model = $model;
	}

    public function create(array $args, PlantsInterface $plantsRepository)
    {
		$plantCare = $this->model->create([
			'beginDate' => $args['beginDate'],
			'endDate' => $args['endDate'],
			'isTaken' => false,
			'ownerId' => Auth::id(),
			'responsibleUserId' => null,
		]);
		foreach ((array)$args['plants'] as $plant) {
			$plant = json_decode($plant);
			$plantsRepository->create([
				'name' => $plant->name,
				'careDetails' => $plant->careDetails,
				'size' => $plant->size,
				'plantCareId' => $plantCare->id,
			]);
		}

        return $plantCare;
	}
	
	public function find(int $id)
	{
		return $this->model->find($id);
	}
}