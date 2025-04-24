@extends('layouts.app')

@section('title', 'Modifier un Voyageur')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Modifier un Voyageur</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('voyageurs.update', $voyageur) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $voyageur->nom) }}" required>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom', $voyageur->prenom) }}" required>
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{ old('ville', $voyageur->ville) }}" required>
                    @error('ville')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label d-block">Genre</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="masculin" value="masculin" {{ old('genre', $voyageur->genre) == 'masculin' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="masculin">Masculin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="feminin" value="feminin" {{ old('genre', $voyageur->genre) == 'feminin' ? 'checked' : '' }}>
                        <label class="form-check-label" for="feminin">Féminin</label>
                    </div>
                    @error('genre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('voyageurs.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection