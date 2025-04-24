@extends('layouts.app')

@section('title', 'Détails du Voyageur')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Détails du Voyageur</h1>
            <a href="{{ route('voyageurs.index') }}" class="btn btn-secondary">Retour</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Nom :</strong> {{ $voyageur->nom }}
            </div>
            <div class="mb-3">
                <strong>Prénom :</strong> {{ $voyageur->prenom }}
            </div>
            <div class="mb-3">
                <strong>Ville :</strong> {{ $voyageur->ville }}
            </div>
            <div class="mb-3">
                <strong>Genre :</strong> {{ ucfirst($voyageur->genre) }}
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h2>Séjours associés</h2>
        </div>
        <div class="card-body">
            @if($voyageur->sejours->isEmpty())
                <p>Aucun séjour trouvé pour ce voyageur.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID Séjour</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voyageur->sejours as $sejour)
                                <tr>
                                    <td>{{ $sejour->id_sejour }}</td>
                                    <td>{{ $sejour->debut }}</td>
                                    <td>{{ $sejour->fin }}</td>
                                    <td>
                                        <a href="{{ route('sejours.show', $sejour) }}" class="btn btn-sm btn-info">Détails</a>
                                        <a href="{{ route('sejours.edit', $sejour) }}" class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('sejours.destroy', $sejour) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce séjour ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection