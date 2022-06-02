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
                                    <th>Kn Id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Active</th>
                                    <th>Publish</th>
                                    <th>Status</th>
                                    <th class="dt-no-sorting"></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($offers as $k => $offer)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $offer->kn_id }}</td>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->price_full }}</td>
                                    <td>
                                        @if ($offer->is_active)
                                            <span class="btn btn-sm text-white bg-primary rounded-pill">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($offer->is_publish)
                                            <span class="btn btn-sm text-white bg-success rounded-pill">Oui</span>
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
                                              
                                              @if ($offer->is_active)
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('offers.active', ['offer' => $offer, 'status' => 0]) }}">
                                                        Désactivé l'offre
                                                    </a>
                                                </li>
                                              @else
                                                <li><a class="dropdown-item" href="{{ route('offers.active', ['offer' => $offer, 'status' => true]) }}">
                                                    Activé l'offre
                                                    </a>
                                                </li>
                                              @endif

                                              @if($offer->is_active)
                                                @if($offer->is_publish)
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('offers.publish', ['offer' => $offer, 'publish' => 0]) }}">
                                                            Annuler la publication de l'offre
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('offers.publish', ['offer' => $offer, 'publish' => true]) }}">
                                                            Publié l'offre
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
