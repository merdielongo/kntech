@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('owners.destroy', ['owner' => $owner]) }}" class="btn btn-success me-2">Blocker le compte</a>
                            <a href="{{ route('owners.destroy', ['owner' => $owner]) }}" class="btn btn-secondary me-2">Modifier</a>
                            <a href="{{ route('owners.destroy', ['owner' => $owner]) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">identifiant</td>
                                    <td><span class="btn btn-sm text-white bg-success rounded-pill">{{ $owner->user->kn_id }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">identifiant OWN</td>
                                    <td><span class="btn btn-sm text-white bg-success rounded-pill">{{ $owner->kn_id }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Nom</td>
                                    <td>{{ $owner->contact->last_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Post-nom</td>
                                    <td>{{ $owner->contact->middle_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Prénom</td>
                                    <td>{{ $owner->contact->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Authorization</td>
                                    <td>
                                        @if ($owner->authorization)
                                            <span class="btn btn-sm text-white bg-success rounded-pill">Oui</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Non</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-5 col-md-5">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">status</td>
                                    <td><span class="btn btn-sm text-white bg-warning rounded-pill text-uppercase">{{ $owner->status }}</span></td>
                                </tr>
                                <tr>
                                    <td>Sexe</td>
                                    <td>{{ Str::ucfirst($owner->contact->gender) }}</td>
                                </tr>
                                <tr>
                                    <td>Mail</td>
                                    <td>{{ $owner->contact->email }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td>{{ $owner->contact->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>{{ $owner->created_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td>{{ $owner->updated_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="card p-5">
                            @if ($owner->contact->photo != null)
                                <img src="{{ $owner->contact->photo }}" alt="">
                            @else
                                <img src="{{ asset('admin-assets/sash/assets/images/users/18.jpg') }}" alt="">
                            @endif
                            <div class="card-body d-flex justify-content-center">
                                <a href="#" class="btn btn-primary">Modifier la photo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Organizations Attribuées</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kn ID</th>
                                    <th>Nom</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($organizations as $k => $item)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $item->kn_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><span class="btn btn-sm text-white bg-warning rounded-pill text-uppercase">{{ $item->status }}</span></td>
                                        <td>{{ $item->created_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary w-100">Detail</a>
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

@section('script')
    <script>
        $('#user').circleProgress({
            value: 0.85,
            size: 70,
            fill: {
            color: ["#05c3fb"]
            }
        });
    </script>
@endsection
