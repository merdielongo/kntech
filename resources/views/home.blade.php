@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <small class="text-muted">New users</small>
                    <h2 class="mb-2 mt-0">2,897</h2>
                    <div id="circle" class="mt-3 mb-3 chart-dropshadow-secondary"></div>
                    <div class="chart-circle-value-3 text-secondary fs-20"><i class="icon icon-user-follow"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-secondary me-2"></span>Monthly users <span class="float-end">60%</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="widget text-center">
                    <small class="text-muted">Total Tax</small>
                    <h2 class="mb-2 mt-0">$7,543</h2>
                    <div id="circle-1" class="mt-3 mb-3 chart-dropshadow-success"></div>
                    <div class="chart-circle-value-3 text-success fs-20"><i class="icon icon-briefcase"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-success me-2"></span>Monthly Income <span class="float-end">$5,863</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="widget text-center">
                    <small class="text-muted">Total Profit</small>
                    <h2 class="mb-2 mt-0">$4,468</h2>
                    <div id="circle-2" class="mt-3 mb-3 chart-dropshadow-warning"></div>
                    <div class="chart-circle-value-3 text-warning fs-20"><i class="icon icon-chart"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-warning me-2"></span>Monthly Profit <span class="float-end">$9,234</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="widget text-center">
                    <small class="text-muted">Total Sales</small>
                    <h2 class="mb-2 mt-0">$6,974</h2>
                    <div id="circle-3" class="mt-3 mb-3 chart-dropshadow-danger"></div>
                    <div class="chart-circle-value-3 text-danger fs-20"><i class="icon icon-basket"></i></div>
                    <p class="mb-0 text-start"><span class="dot-label bg-danger me-2"></span>Monthly Sales <span class="float-end">$8,097</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
