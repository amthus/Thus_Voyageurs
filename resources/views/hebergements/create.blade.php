@extends('layouts.app')

@section('title', 'Ajouter un Hébergement')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Ajouter un Hébergement</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('hebergements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="capacite" class="form-label">Capacité</label>
                    <input type="number" class="form-control @error('capacite') is-invalid @enderror" id="capacite" name="capacite" value="{{ old('capacite') }}" required>
                    @error('capacite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}" required>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lieu" class="form-label">Lieu</label>
                    <input type="text" class="form-control @error('lieu') is-invalid @enderror" id="lieu" name="lieu" value="{{ old('lieu') }}" required>
                    @error('lieu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="disponible" class="form-label">Disponible</label>
                    <select class="form-select @error('disponible') is-invalid @enderror" id="disponible" name="disponible" required>
                        <option value="1" {{ old('disponible') == 1 ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('disponible') == 0 ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('disponible')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('hebergements.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection