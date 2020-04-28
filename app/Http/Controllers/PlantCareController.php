<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Interfaces\PlantsInterface;
use App\Repositories\Interfaces\PlantCaresInterface;
use App\Repositories\Interfaces\UsersInterface;

use App\Http\Requests\PlantCare;
use App\CarerMatcher;


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
            $plantCare = $plantCareRepository->create($request->all(), $plantsRepository);
            DB::commit();
            return redirect()->route('showPossibleCarers', ['plantCareId' => $plantCare->id])->withSuccess('Pedido de cuidado criado! Peça a um dos cuidadores disponíveis pra te ajudar.');
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

    public function showPossibleCarers(int $plantCareId, PlantCaresInterface $plantCareRepository, UsersInterface $userRepository)
    {
        $carerMacher = new CarerMatcher();
        $carers = $carerMacher->getCarersForPlants($plantCareId, $plantCareRepository, $userRepository)->paginate(10);
        return view('plantCare.carersList', ['carers' => $carers]);
    }
}
