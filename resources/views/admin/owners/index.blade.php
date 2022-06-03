@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-6">
                        <h3 class="card-title">Liste des offres disponibles</h3>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('owners.create') }}" class="btn btn-primary">Ajouter</a>
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
                                    <th class="wd-15p">Full name</th>
                                    <th class="wd-15p">Active</th>
                                    <th class="wd-15p">Auhtorized</th>
                                    <th class="wd-25p">Status</th>
                                    <th class="dt-no-sorting"></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($owners as $k => $owner)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $owner->kn_id }}</td>
                                    <td>{{ $owner->contact->full_name }}</td>
                                    <td>
                                        @if ($owner->is_active)
                                            <span class="btn btn-sm text-white bg-secondary rounded-pill">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($owner->authorization)
                                            <span class="btn btn-sm text-white bg-success rounded-pill">Oui</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Non</span>
                                        @endif
                                    </td>
                                    <td><h3 class="badge rounded-pill bg-warning p-2">{{ Str::upper($owner->status) }}</span></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Detail</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
                                              <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                              <li><a class="dropdown-item" href="#">Editer</a></li>
                                              <li><a class="dropdown-item" href="#">Supprimer</a></li>
                                              <li><a class="dropdown-item" href="#">Modifier le status</a></li>
                                              @if ($owner->is_active)
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('owners.active', ['owner' => $owner, 'status' => 0]) }}">
                                                        Désactivé le compte
                                                    </a>
                                                </li>
                                              @else
                                                <li><a class="dropdown-item" href="{{ route('owners.active', ['owner' => $owner, 'status' => true]) }}">
                                                    Activé le compte
                                                    </a>
                                                </li>
                                              @endif

                                              @if($owner->is_active)
                                                @if($owner->authorization)
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('owners.authorized', ['owner' => $owner, 'authorization' => 0]) }}">
                                                            Annuler l'authorization
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('owners.authorized', ['owner' => $owner, 'authorization' => true]) }}">
                                                            Activé l'authorization
                                                        </a>
                                                    </li>
                                                @endif
                                              @endif
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
