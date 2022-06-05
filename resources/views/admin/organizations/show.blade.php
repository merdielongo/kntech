@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('organizations.destroy', ['organization' => $organization]) }}" class="btn btn-success me-2">Blocker l'organization</a>
                            <a href="{{ route('organizations.destroy', ['organization' => $organization]) }}" class="btn btn-secondary me-2">Modifier</a>
                            <a href="{{ route('organizations.destroy', ['organization' => $organization]) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">identifiant</td>
                                    <td><span class="btn btn-sm text-white bg-success rounded-pill">{{ $organization->kn_id }}</span></td>
                                </tr>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{ $organization->name }}</td>
                                </tr>
                                <tr>
                                    <td>Activation de l'agranization</td>
                                    <td>
                                        @if ($organization->is_active)
                                            <span class="btn btn-sm text-white bg-primary rounded-pill text-uppercase">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-warning rounded-pill text-uppercase">Désactivé</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nom du proprietaire</td>
                                    <td>{{ $organization->owner->contact->full_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">status</td>
                                    <td><span class="btn btn-sm text-white bg-warning rounded-pill text-uppercase">{{ $organization->status }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-5 col-md-5">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Creation</td>
                                    <td>{{ $organization->created_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Last update</td>
                                    <td>{{ $organization->updated_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn btn-primary">Ajouter un manager</a></td>
                                    <td><a href="#" class="btn btn-primary">Ajouter une entité</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn btn-primary">Gérée les accées</a></td>
                                    <td><a href="#" class="btn btn-primary">Achété une license</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="btn btn-primary">Acheté des modules supl.</a></td>
                                    <td><a href="#" class="btn btn-primary">Achété une license</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="card p-5">
                            @if ($organization->logo != null)
                                <img src="{{ $organization->logo }}" alt="">
                            @else
                                <img src="{{ asset('admin-assets/sash/assets/images/users/18.jpg') }}" alt="">
                            @endif
                            <div class="card-body d-flex justify-content-center">
                                <a href="#" class="btn btn-primary">Modifier le logo</a>
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
                            <h3 class="card-title">Mes licenses</h3>
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
                                    <th>Status</th>
                                    <th>Date d'activation</th>
                                    <th>Date d'expiration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($licenses as $key => $license)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $license->kn_id }}</td>
                                    <td>{{ $license->status }}</td>
                                    <td>{{ $license->beginning_license }}</td>
                                    <td>{{ $license->expiration_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <small class="text-muted">Utilisateurs abonnées</small>
                        <h2 class="mb-2 mt-0">2,897</h2>
                        <div id="user" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                        <div class="chart-circle-value-3 text-secondary fs-20"><i class="icon icon-user-follow"></i></div>
                        <p class="mb-0 text-start"><span class="dot-label bg-secondary me-2"></span>Utilisateurs mensuels <span class="float-end">60%</span></p>
                    </div>
                </div>
                <a class="btn btn-sm text-white btn-secondary">View all</a>
            </div>
        </div>
        <!-- COL END -->

        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="widget text-center">
                        <small class="text-muted">Total des renouvellements</small>
                        <h2 class="mb-2 mt-0">$7,543</h2>
                        <div id="circle-1" class="mt-3 mb-3 chart-dropshadow-success"></div>
                        <div class="chart-circle-value-3 text-success fs-20"><i class="icon icon-briefcase"></i></div>
                        <p class="mb-0 text-start"><span class="dot-label bg-success me-2"></span>Revenu mensuel <span class="float-end">$5,863</span></p>
                    </div>
                </div>
                <a class="btn btn-sm text-white btn-success">View all</a>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="widget text-center">
                        <small class="text-muted">Bénéfice total</small>
                        <h2 class="mb-2 mt-0">$4,468</h2>
                        <div id="circle-2" class="mt-3 mb-3 chart-dropshadow-warning"></div>
                        <div class="chart-circle-value-3 text-warning fs-20"><i class="icon icon-chart"></i></div>
                        <p class="mb-0 text-start"><span class="dot-label bg-warning me-2"></span>Bénéfice mensuel <span class="float-end">$9,234</span></p>
                    </div>
                </div>
                <a class="btn btn-sm text-white btn-warning">View all</a>
            </div>
        </div>
        <!-- COL END -->
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="widget text-center">
                        <small class="text-muted">Total des resiliations</small>
                        <h2 class="mb-2 mt-0">6,974</h2>
                        <div id="circle-3" class="mt-3 mb-3 chart-dropshadow-danger"></div>
                        <div class="chart-circle-value-3 text-danger fs-20"><i class="fa fa-exclamation-triangle"></i></div>
                        <p class="mb-0 text-start"><span class="dot-label bg-danger me-2"></span>Resiliation mensuel <span class="float-end">40</span></p>
                    </div>
                </div>
                <a class="btn btn-sm text-white btn-danger">View all</a>
            </div>
        </div>
        <!-- COL END -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <h3 class="card-title">Liste des offres disponibles</h3>
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
                                    <th>Status</th>
                                    <th>Date d'activation</th>
                                    <th>Date d'expiration</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($licenses as $key => $license)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $license->kn_id }}</td>
                                    <td>{{ $license->status }}</td>
                                    <td>{{ $license->beginning_license }}</td>
                                    <td>{{ $license->expiration_at }}</td>
                                </tr>
                                @endforeach --}}
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
