@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card p-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('offers.destroy', ['offer' => $offer]) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">identifiant</td>
                                    <td><span class="btn btn-sm text-white bg-success rounded-pill">{{ $offer->kn_id }}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">name</td>
                                    <td>{{ $offer->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">price</td>
                                    <td>{{ $offer->price }} {{ $offer->currency->code }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">status</td>
                                    <td><span class="btn btn-sm text-white bg-warning rounded-pill text-uppercase">{{ $offer->status }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <table class="table">
                            <tbody>
                                @if($offer->is_active)
                                <tr>
                                    <td class="text-uppercase">publication</td>
                                    <td>
                                        @if($offer->is_publish)
                                            <span class="text-uppercase btn btn-sm text-white bg-success rounded-pill">Activé</span>
                                        @else
                                            <span class="btn btn-sm text-white bg-danger rounded-pill">Désactivé</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="text-uppercase">Creation</td>
                                    <td>{{ $offer->created_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Last update</td>
                                    <td>{{ $offer->updated_at->locale('fr_FR')->isoFormat('LLL') }}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">admin</td>
                                    <td>
                                        <span class="btn btn-sm text-white bg-primary rounded-pill text-uppercase">
                                            {{ $offer->user->kn_id }}
                                        </span>
                                        <span class="btn btn-sm text-white bg-warning rounded-pill text-uppercase">
                                            {{ $offer->user->contact->full_name }}
                                        </span>
                                    </td>
                                </tr>
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
