@extends('layout')
@section('title','Créer un rôle')
@section('content')
<div class="container px-4">
  <h1>Créer un rôle</h1>
  <div class="card p-4">
    <form action="{{ route('roles.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Code Rôle</label>
        <input type="text" name="code_role" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nom Rôle</label>
        <input type="text" name="nom_role" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <input type="text" name="description" class="form-control">
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Annuler</a>
        <button type="submit" class="btn btn-info">Enregistrer</button>
      </div>
    </form>
  </div>
</div>
@endsection
