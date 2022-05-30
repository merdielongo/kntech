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
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="wd-15p">Kn Id</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Price</th>
                                    <th class="wd-20p">Availability</th>
                                    <th class="wd-15p">Active</th>
                                    <th class="wd-10p">Publish</th>
                                    <th class="wd-25p">Promotion</th>
                                    <th class="wd-25p">Status</th>
                                    <th class="dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($offers as $k => $offer)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $offer->kn_id }}</td>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->price_full }}</td>
                                    <td>{{ $offer->availability_model }}</td>
                                   @if ($offer->is_active)
                                        <span class="badge badge-success">Active</span>
                                   @else
                                        <span class="badge badge-warning">{{ $offer->status }}</span>
                                   @endif
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
