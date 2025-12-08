@extends('layouts.admin')

@section('title', 'Modifier une langue')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Modifier la langue</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('langues.update', $langue->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Code Langue <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ langues['code_langue'] }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="client" class="form-label">Nom Langue <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="client" name="client" value="{{ langues['nom_langue'] }}" required>
                        </div>
                        
                       <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $opportunite['description'] }}</textarea>
                       </div>
                    </div>
                </div>
        
                <div class="d-flex justify-content-between">
                    <a href="{{ route('langues.index') }}" class="btn btn-secondary">
                        <i class="ti-arrow-left mr-2"></i>Retour
                   </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti-reload mr-2"></i>Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection