<?php

namespace App\Http\Controllers;

use App\Models\Voyageur;
use Illuminate\Http\Request;

class VoyageurController extends Controller
{
    public function index(Request $request)
    {
        $query = Voyageur::query();
        
        // Recherche par nom
        if ($request->has('nom') && !empty($request->nom)) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }
        
        // Recherche par prénom
        if ($request->has('prenom') && !empty($request->prenom)) {
            $query->where('prenom', 'like', '%' . $request->prenom . '%');
        }
        
        // Recherche par ville
        if ($request->has('ville') && !empty($request->ville)) {
            $query->where('ville', 'like', '%' . $request->ville . '%');
        }
        
        // Recherche par genre
        if ($request->has('genre') && !empty($request->genre)) {
            $query->where('genre', $request->genre);
        }
        
        $voyageurs = $query->paginate(10);
        
        return view('voyageurs.index', compact('voyageurs'));
    }

    public function create()
    {
        return view('voyageurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'genre' => 'required|in:masculin,feminin',
        ]);

        Voyageur::create($request->all());

        return redirect()->route('voyageurs.index')
                        ->with('success', 'Voyageur créé avec succès.');
    }

    public function show(Voyageur $voyageur)
    {
        return view('voyageurs.show', compact('voyageur'));
    }

    public function edit(Voyageur $voyageur)
    {
        return view('voyageurs.edit', compact('voyageur'));
    }

    public function update(Request $request, Voyageur $voyageur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'genre' => 'required|in:masculin,feminin',
        ]);

        $voyageur->update($request->all());

        return redirect()->route('voyageurs.index')
                        ->with('success', 'Voyageur mis à jour avec succès.');
    }

    public function destroy(Voyageur $voyageur)
    {
        $voyageur->delete();

        return redirect()->route('voyageurs.index')
                        ->with('success', 'Voyageur supprimé avec succès.');
    }
}