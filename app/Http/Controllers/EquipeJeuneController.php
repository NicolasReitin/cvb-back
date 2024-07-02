<?php

namespace App\Http\Controllers;

use App\Models\EquipeJeune;
use App\Http\Resources\EquipesResource;
use App\Http\Requests\Storeequipe_jeuneRequest;
use App\Http\Requests\Updateequipe_jeuneRequest;

class EquipeJeuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($equipe_id)
    {
        $equipe = EquipeJeune::query()
        ->where('id', $equipe_id)
        ->with(['joueurs' => function ($query) {
            $query->orderBy('nom', 'asc'); // Tri par ordre alphabétique du nom
        }])
        ->first();

        return response()->json([
            'equipe' => EquipesResource::make($equipe),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeequipe_jeuneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(equipeJeune $equipeJeune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(equipeJeune $equipeJeune)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateequipe_jeuneRequest $request, equipeJeune $equipeJeune)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(equipeJeune $equipe_jeune)
    {
        //
    }
}
