@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-6">
                        <h3 class="card-title">Liste des organizations disponible</h3>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('organizations.create') }}" class="btn btn-primary">Ajouter</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="wd-15p">Kn Id</th>
                                    <th class="wd-15d">Owner name</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Active</th>
                                    <th class="wd-25p">Status</th>
                                    <th class="dt-no-sorting"></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($organizations as $k => $organization)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $organization->kn_id }}</td>
                                    <td>{{ $organization->owner->contact->full_name }}</td>
                                    <td>{{ $organization->name }}</td>
                                    <td>
                                        @if ($organization->is_active)
                                            <span class="btn btn-sm text-white bg-primary rounded-pill">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                    <td><h3 class="badge rounded-pill bg-warning p-2">{{ Str::upper($organization->status) }}</span></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('organizations.show', ['organization' => $organization]) }}" class="btn btn-primary">Detail</a>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                              <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                                @if ($organization->is_active)
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('organizations.active', ['organization' => $organization, 'status' => 0]) }}">
                                                        Désactivé l'organization
                                                    </a>
                                                </li>
                                              @else
                                                <li><a class="dropdown-item" href="{{ route('organizations.active', ['organization' => $organization, 'status' => true]) }}">
                                                    Activé l'organization
                                                    </a>
                                                </li>
                                              @endif
                                              <li><a class="dropdown-item" href="#">Editer</a></li>
                                              <li><a class="dropdown-item" href="#">Supprimer</a></li>
                                              <li><a class="dropdown-item" href="#">Modifier le status</a></li>
                                            </ul>
                                          </div>

                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
