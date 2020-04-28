<?php

namespace App;

use App\Repositories\Interfaces\PlantCaresInterface;
use App\Repositories\Interfaces\UsersInterface;
use Illuminate\Database\Eloquent\Collection;

class CarerMatcher
{
    public function getCarersForPlants(int $plantCareId, PlantCaresInterface $plantCareRepository, UsersInterface $usersRepository) : Collection
    {
        $plantCare = $plantCareRepository->find($plantCareId);
        $plantsMaxSize = $plantCare->maxPlantSize();
        $users = $usersRepository->findCarerForSize($plantsMaxSize);
        return $users;
    }
}
