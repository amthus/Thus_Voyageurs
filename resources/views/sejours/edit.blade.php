@extends('layouts.app')

@section('title', 'Modifier un Séjour')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Modifier un Séjour</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('sejours.update', $sejour) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id_voyageur" class="form-label">Voyageur</label>
                    <select class="form-select @error('id_voyageur') is-invalid @enderror" id="id_voyageur" name="id_voyageur" required>
                        <option value="">Sélectionnez un voyageur</option>
                        @foreach($voyageurs as $voyageur)
                            <option value="{{ $voyageur->id_voyageur }}" {{ old('id_voyageur', $sejour->id_voyageur) == $voyageur->id_voyageur ? 'selected' : '' }}>{{ $voyageur->nom }} {{ $voyageur->prenom }}</option>
                        @endforeach
                    </select>
                    @error('id_voyageur')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="debut" class="form-label">Date de début</label>
                    <input type="date" class="form-control @error('debut') is-invalid @enderror" id="debut" name="debut" value="{{ old('debut', $sejour->debut) }}" required>
                    @error('debut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fin" class="form-label">Date de fin</label>
                    <input type="date" class="form-control @error('fin') is-invalid @enderror" id="fin" name="fin" value="{{ old('fin', $sejour->fin) }}" required>
                    @error('fin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('sejours.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection