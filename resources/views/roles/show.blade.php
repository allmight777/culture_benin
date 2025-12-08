@extends('layout')

@section('title', 'Détails du commentaire')

@section('content')
<div class="card card-info card-outline mb-4">
    <div class="card-header"><div class="card-title">Détails du commentaire</div></div>

    <div class="card-body">

        <p><strong>ID :</strong> {{ $commentaire->id }}</p>
        <p><strong>Texte :</strong> {{ $commentaire->texte }}</p>
        <p><strong>Note :</strong> {{ $commentaire->note ?? '-' }}</p>
        <p><strong>Date :</strong> {{ $commentaire->date }}</p>

        <p><strong>Utilisateur :</strong>
            {{ $commentaire->utilisateur->nom ?? '—' }}
        </p>

        <p><strong>Contenu :</strong>
            {{ $commentaire->contenu->titre ?? '—' }}
        </p>

    </div>

    <div class="card-footer">
        <a href="{{ route('commentaires.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</div>
@endsection
