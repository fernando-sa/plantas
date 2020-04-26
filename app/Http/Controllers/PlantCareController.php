<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Interfaces\PlantsInterface;
use App\Repositories\Interfaces\PlantCaresInterface;

use App\Http\Requests\PlantCare;

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
            $plantCareRepository->create($request->all(), $plantsRepository);
            DB::commit();
            // TODO: redirect to possible takers list -fernando
            return redirect()->route('home')->withSuccess('Pedido de cuidado criado');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return redirect()->route('home')->withErrors(config('errors.defaultError'));
        }
    }

    public function userRequests()
    {
        $plantCares = Auth::user()->plantCares->paginate(10);
        return view('plantCare.userRequests', ['plantCares' => $plantCares]);
    }
}
