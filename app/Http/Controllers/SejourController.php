<?php

namespace App\Http\Controllers;

use App\Models\Sejour;
use App\Models\Voyageur;
use Illuminate\Http\Request;

class SejourController extends Controller
{
    public function index(Request $request)
    {
        $query = Sejour::with('voyageur');
        
        // Recherche par ID voyageur
        if ($request->has('id_voyageur') && !empty($request->id_voyageur)) {
            $query->where('id_voyageur', $request->id_voyageur);
        }
        
        // Recherche par date de début
        if ($request->has('debut') && !empty($request->debut)) {
            $query->where('debut', '>=', $request->debut);
        }
        
        // Recherche par date de fin
        if ($request->has('fin') && !empty($request->fin)) {
            $query->where('fin', '<=', $request->fin);
        }
        
        $sejours = $query->paginate(10);
        
        return view('sejours.index', compact('sejours'));
    }

    public function create()
    {
        $voyageurs = Voyageur::all();
        return view('sejours.create', compact('voyageurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_voyageur' => 'required|exists:voyageurs,id_voyageur',
            'debut' => 'required|date',
            'fin' => 'required|date|after_or_equal:debut',
        ]);

        Sejour::create($request->all());

        return redirect()->route('sejours.index')
                        ->with('success', 'Séjour créé avec succès.');
    }

    public function show(Sejour $sejour)
    {
        return view('sejours.show', compact('sejour'));
    }

    public function edit(Sejour $sejour)
    {
        $voyageurs = Voyageur::all();
        return view('sejours.edit', compact('sejour', 'voyageurs'));
    }

    public function update(Request $request, Sejour $sejour)
    {
        $request->validate([
            'id_voyageur' => 'required|exists:voyageurs,id_voyageur',
            'debut' => 'required|date',
            'fin' => 'required|date|after_or_equal:debut',
        ]);

        $sejour->update($request->all());

        return redirect()->route('sejours.index')
                        ->with('success', 'Séjour mis à jour avec succès.');
    }

    public function destroy(Sejour $sejour)
    {
        $sejour->delete();

        return redirect()->route('sejours.index')
                        ->with('success', 'Séjour supprimé avec succès.');
    }
}