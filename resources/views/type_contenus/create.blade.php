@extends('layout')

@section('title')
<div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Langues</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Langues</li>
                </ol>
              </div>
            </div>
@endsection

@section('content')
 <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Langues</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('langues.store') }}" method="POST" class="needs-validation" novalidate>
                   @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Row-->
                      <div class="row g-3">
                        <!--begin::Col-->
                        <div class="col-md-12">
                          <label for="code_langue" class="form-label">Code Langue</label>
                          <input
                            type="text"
                            class="form-control"
                            name="code_langue"
                            required
                          />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-12">
                          <label for="nom_langue" class="form-label">Nom Langue</label>
                          <input
                            type="text"
                            class="form-control"
                            name="nom_langue"
                            required
                          />
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-12">
                          <label for="description" class="form-label">Description</label>
                          <input
                            type="text"
                            class="form-control"
                            name="description"
                            required
                          />
                        </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Enregister</button>
                      <a href="{{ route('langues.index') }}"><button type="submit" class="btn float-end">Annuler</button></a>
                    </div>
                </div>
@endsection