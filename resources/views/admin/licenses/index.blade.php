@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-6">
                        <h3 class="card-title">Liste des License disponible</h3>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('licenses.create') }}" class="btn btn-primary">Ajouter</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kn Id</th>
                                    <th>Organization</th>
                                    <th>Owner</th>
                                    <th>Days</th>
                                    <th>Expired</th>
                                    <th>Active</th>
                                    <th class="wd-25p">Status</th>
                                    <th class="dt-no-sorting"></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($licenses as $k => $license)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $license->kn_id }}</td>
                                    <td>{{ $license->organization->name }}</td>
                                    <td>{{ $license->owner->contact->full_name }}</td>
                                    <td>{{ $license->day }}</td>
                                    <td>
                                        @if ($license->is_expired)
                                            <span class="btn bg-primary text-white btn-sm">NON</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">OUI</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($license->is_active)
                                            <span class="btn bg-primary text-white btn-sm">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                    <td><h3 class="badge rounded-pill bg-warning p-2">{{ Str::upper($license->status) }}</span></td>
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
