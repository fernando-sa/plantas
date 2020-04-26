<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PlantCaresInterface;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PlantCare;
use App\Repositories\Interfaces\PlantsInterface;

class PlantCareController extends Controller
{
    public function index()
    {
        return view('plantCare.create');
    }

    public function store(PlantCare $request, PlantCaresInterface $plantCareRepository, PlantsInterface $plantsRepository)
    {
        DB::beginTransaction();
        try {
            $plantCareRepository->create($request, $plantsRepository);
            DB::commit();
            return redirect()->route('home')->withErrors('Just testing');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect()->route('home')->withErrors('An error just occurred!');
        }
    }
}
