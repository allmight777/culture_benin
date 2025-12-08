@extends('layout')
@section('title','Modifier un rôle')
@section('content')
<div class="container px-4">
  <h1>Modifier le rôle</h1>
  <div class="card p-4">
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Code Rôle</label>
        <input type="text" name="code_role" class="form-control" value="{{ $role->code_role }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nom Rôle</label>
        <input type="text" name="nom_role" class="form-control" value="{{ $role->nom_role }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $role->description }}</textarea>
      </div>
      <div class="d-flex justify-content-between">
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Retour</a>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </div>
    </form>
  </div>
</div>
@endsection
