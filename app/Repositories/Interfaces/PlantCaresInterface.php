<?php
namespace App\Repositories\Interfaces;

use App\Http\Requests\PlantCare as PlantCareRequest;

interface PlantCaresInterface{
    
    public function create(array $args, PlantsInterface $plantsRepository);
    
}