@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-6">
                        <h3 class="card-title">Liste des sessions disponible</h3>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('sessions.create') }}" class="btn btn-primary">Ajouter</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Model</th>
                                    <th>Name</th>
                                    <th>Started At</th>
                                    <th>Ending At</th>
                                    <th>Active</th>
                                    <th class="wd-25p">Status</th>
                                    <th class="dt-no-sorting"></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($sessions as $k => $session)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $session->model }}</td>
                                    <td>{{ $session->full_name }}</td>
                                    <td>{{ $session->started_at }}</td>
                                    <td>{{ $session->ending_at }}</td>
                                    <td>
                                        @if ($session->is_expired)
                                            <span class="btn bg-primary text-white btn-sm">NON</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">OUI</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($session->is_active)
                                            <span class="btn bg-primary text-white btn-sm">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                    <td><h3 class="badge rounded-pill bg-warning p-2">{{ Str::upper($session->status) }}</span></td>
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
