@extends('layouts.app')

@section('title', 'Détails de l\'Hébergement')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Détails de l'Hébergement</h1>
            <a href="{{ route('hebergements.index') }}" class="btn btn-secondary">Retour</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Nom :</strong> {{ $hebergement->nom }}
            </div>
            <div class="mb-3">
                <strong>Capacité :</strong> {{ $hebergement->capacite }}
            </div>
            <div class="mb-3">
                <strong>Type :</strong> {{ $hebergement->type }}
            </div>
            <div class="mb-3">
                <strong>Lieu :</strong> {{ $hebergement->lieu }}
            </div>
            <div class="mb-3">
                <strong>Photo :</strong>
                @if($hebergement->photo)
                    <img src="{{ asset('storage/' . $hebergement->photo) }}" alt="{{ $hebergement->nom }}" class="img-thumbnail" style="width: 200px;">
                @else
                    Aucune photo
                @endif
            </div>
            <div class="mb-3">
                <strong>Disponible :</strong> {{ $hebergement->disponible ? 'Oui' : 'Non' }}
            </div>
        </div>
    </div>
@endsection