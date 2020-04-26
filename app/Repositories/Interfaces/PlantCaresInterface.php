<?php
namespace App\Repositories\Interfaces;

use App\Http\Requests\PlantCare as PlantCareRequest;

interface PlantCaresInterface{
    
    public function create(PlantCareRequest $args, PlantsInterface $plantsRepository);
    
}