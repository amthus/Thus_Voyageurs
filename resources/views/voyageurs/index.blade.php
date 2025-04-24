@extends('layouts.app')

@section('title', 'Liste des Voyageurs')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Voyageurs</h1>
        <a href="{{ route('voyageurs.create') }}" class="btn btn-primary">Ajouter un voyageur</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Recherche</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('voyageurs.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ request('nom') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ request('prenom') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="{{ request('ville') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" id="genre" name="genre">
                            <option value="">Tous</option>
                            <option value="masculin" {{ request('genre') == 'masculin' ? 'selected' : '' }}>Masculin</option>
                            <option value="feminin" {{ request('genre') == 'feminin' ? 'selected' : '' }}>Féminin</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                        <a href="{{ route('voyageurs.index') }}" class="btn btn-secondary">Réinitialiser</a>
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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Ville</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($voyageurs as $voyageur)
                    <tr>
                        <td>{{ $voyageur->id_voyageur }}</td>
                        <td>{{ $voyageur->nom }}</td>
                        <td>{{ $voyageur->prenom }}</td>
                        <td>{{ $voyageur->ville }}</td>
                        <td>{{ ucfirst($voyageur->genre) }}</td>
                        <td>
                            <a href="{{ route('voyageurs.show', $voyageur) }}" class="btn btn-sm btn-info">Détails</a>
                            <a href="{{ route('voyageurs.edit', $voyageur) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('voyageurs.destroy', $voyageur) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce voyageur ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun voyageur trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $voyageurs->links() }}
    
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Gestion des Voyageurs. Tous droits réservés.</p>
            <p>Conçu et développé par <strong>Malthus AMETEPE</strong></p>
        </div>
    </footer>
@endsection