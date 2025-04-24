@extends('layouts.app')

@section('title', 'Liste des Hébergements')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Hébergements</h1>
        <a href="{{ route('hebergements.create') }}" class="btn btn-primary">Ajouter un hébergement</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Recherche</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('hebergements.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ request('nom') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ request('type') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="lieu" class="form-label">Lieu</label>
                        <input type="text" class="form-control" id="lieu" name="lieu" value="{{ request('lieu') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="capacite" class="form-label">Capacité minimum</label>
                        <input type="number" class="form-control" id="capacite" name="capacite" value="{{ request('capacite') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="disponible" class="form-label">Disponible</label>
                        <select class="form-select" id="disponible" name="disponible">
                            <option value="">Tous</option>
                            <option value="1" {{ request('disponible') == '1' ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ request('disponible') == '0' ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                        <a href="{{ route('hebergements.index') }}" class="btn btn-secondary">Réinitialiser</a>
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
                    <th>Capacité</th>
                    <th>Type</th>
                    <th>Lieu</th>
                    <th>Photo</th>
                    <th>Disponible</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hebergements as $hebergement)
                    <tr>
                        <td>{{ $hebergement->id }}</td>
                        <td>{{ $hebergement->nom }}</td>
                        <td>{{ $hebergement->capacite }}</td>
                        <td>{{ $hebergement->type }}</td>
                        <td>{{ $hebergement->lieu }}</td>
                        <td>
                            @if($hebergement->photo)
                                <img src="{{ asset('storage/' . $hebergement->photo) }}" alt="{{ $hebergement->nom }}" class="img-thumbnail" style="width: 100px;">
                            @else
                                Aucune photo
                            @endif
                        </td>
                        <td>{{ $hebergement->disponible ? 'Oui' : 'Non' }}</td>
                        <td>
                            <a href="{{ route('hebergements.show', $hebergement) }}" class="btn btn-sm btn-info">Détails</a>
                            <a href="{{ route('hebergements.edit', $hebergement) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('hebergements.destroy', $hebergement) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet hébergement ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Aucun hébergement trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $hebergements->links() }}
<footer class="footer">
    <div class="container text-center">
        <p>&copy; {{ date('Y') }} Gestion des Voyageurs. Tous droits réservés.</p>
        <p>Conçu et développé par <strong>Malthus AMETEPE</strong></p>
    </div>
</footer>
@endsection