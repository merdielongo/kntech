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
                            <a href="{{ route('offers.create') }}" class="btn btn-primary">Ajouter</a>
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
                                    <th class="wd-15p">Gender</th>
                                    <th class="wd-15p">Email</th>
                                    <th class="wd-15p">Active</th>
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
                                    <td>{{ $owner->gender }}</td>
                                    <th>{{ $owner->contact->email }}</th>
                                    <td>
                                        @if ($owner->is_active)
                                            <span class="btn bg-primary text-white btn-sm">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($offer->is_publish)
                                            <span class="btn bg-success text-white btn-sm">Oui</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Non</span>
                                        @endif
                                    </td>
                                    <td><h3 class="badge rounded-pill bg-warning p-2">{{ Str::upper($offer->status) }}</span></td>
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
