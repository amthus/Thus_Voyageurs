@extends('layouts.app')

@section('title', 'Liste des Séjours')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Séjours</h1>
        <a href="{{ route('sejours.create') }}" class="btn btn-primary">Ajouter un séjour</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Recherche</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('sejours.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="id_voyageur" class="form-label">Voyageur</label>
                        <select class="form-select" id="id_voyageur" name="id_voyageur">
                            <option value="">Tous</option>
                            @foreach(App\Models\Voyageur::all() as $voyageur)
                                <option value="{{ $voyageur->id_voyageur }}" {{ request('id_voyageur') == $voyageur->id_voyageur ? 'selected' : '' }}>
                                    {{ $voyageur->nom }} {{ $voyageur->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="debut" class="form-label">Date de début</label>
                        <input type="date" class="form-control" id="debut" name="debut" value="{{ request('debut') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="fin" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="fin" name="fin" value="{{ request('fin') }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                        <a href="{{ route('sejours.index') }}" class="btn btn-secondary">Réinitialiser</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voyageur</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sejours as $sejour)
                    <tr>
                        <td>{{ $sejour->id_sejour }}</td>
                        <td>{{ $sejour->voyageur->nom }} {{ $sejour->voyageur->prenom }}</td>
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
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun séjour trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $sejours->links() }}

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Gestion des Voyageurs. Tous droits réservés.</p>
            <p>Conçu et développé par <strong>Malthus AMETEPE</strong></p>
        </div>
    </footer>
@endsection
