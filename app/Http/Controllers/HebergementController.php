<?php

namespace App\Http\Controllers;

use App\Models\Hebergement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HebergementController extends Controller
{
    public function index(Request $request)
    {
        $query = Hebergement::query();
        
        // Recherche par nom
        if ($request->has('nom') && !empty($request->nom)) {
            $query->where('nom', 'like', '%' . $request->nom . '%');
        }
        
        // Recherche par type
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }
        
        // Recherche par lieu
        if ($request->has('lieu') && !empty($request->lieu)) {
            $query->where('lieu', 'like', '%' . $request->lieu . '%');
        }
        
        // Recherche par capacité
        if ($request->has('capacite') && !empty($request->capacite)) {
            $query->where('capacite', '>=', $request->capacite);
        }
        
        // Recherche par disponibilité
        if ($request->has('disponible')) {
            $query->where('disponible', $request->disponible == 1);
        }
        
        $hebergements = $query->paginate(10);
        
        return view('hebergements.index', compact('hebergements'));
    }

    public function create()
    {
        return view('hebergements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'type' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'disponible' => 'required|boolean',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('hebergements', 'public');
            $data['photo'] = $photoPath;
        }

        Hebergement::create($data);

        return redirect()->route('hebergements.index')
                        ->with('success', 'Hébergement créé avec succès.');
    }

    public function show(Hebergement $hebergement)
    {
        return view('hebergements.show', compact('hebergement'));
    }

    public function edit(Hebergement $hebergement)
    {
        return view('hebergements.edit', compact('hebergement'));
    }

    public function update(Request $request, Hebergement $hebergement)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer|min:1',
            'type' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'disponible' => 'required|boolean',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($hebergement->photo) {
                Storage::disk('public')->delete($hebergement->photo);
            }
            
            $photoPath = $request->file('photo')->store('hebergements', 'public');
            $data['photo'] = $photoPath;
        }

        $hebergement->update($data);

        return redirect()->route('hebergements.index')
                        ->with('success', 'Hébergement mis à jour avec succès.');
    }

    public function destroy(Hebergement $hebergement)
    {
        // Supprimer la photo si elle existe
        if ($hebergement->photo) {
            Storage::disk('public')->delete($hebergement->photo);
        }
        
        $hebergement->delete();

        return redirect()->route('hebergements.index')
                        ->with('success', 'Hébergement supprimé avec succès.');
    }
}