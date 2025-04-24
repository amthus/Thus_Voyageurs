@extends('layouts.app')

@section('title', 'Détails du Séjour')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Détails du Séjour</h1>
            <a href="{{ route('sejours.index') }}" class="btn btn-secondary">Retour</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Voyageur :</strong> {{ $sejour->voyageur->nom }} {{ $sejour->voyageur->prenom }}
            </div>
            <div class="mb-3">
                <strong>Date de début :</strong> {{ $sejour->debut }}
            </div>
            <div class="mb-3">
                <strong>Date de fin :</strong> {{ $sejour->fin }}
            </div>
        </div>
    </div>
@endsection