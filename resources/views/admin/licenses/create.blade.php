@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-12">
                        <h3 class="card-title">{{ __('Enregistrement de la license') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('licenses.store') }}" method="POST" class="row" enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                {{ $errors }}
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Offré</b></label>  <span class="text-danger">*</span>
                                    <select name="offer" class="form-control select2-show-search " data-placeholder="Choose one (with optgroup)" class="offer_id">
                                        <option value="">Selectionné une offré</option>
                                       @foreach ($offers as $offer)
                                        <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                                       @endforeach
                                    </select>
                                    @if ($errors->has('offer'))
                                         <div class="text-danger"><b>{{ $errors->first('offer') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Organisation</b></label>  <span class="text-danger">*</span>
                                    <select name="organization" class="form-control select2-show-search " data-placeholder="Choose one (with optgroup)" class="organization_id">
                                        <option value="">Selectionné une organization</option>
                                       @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                       @endforeach
                                    </select>
                                    @if ($errors->has('organization'))
                                         <div class="text-danger"><b>{{ $errors->first('organization') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Status</b></label>  <span class="text-danger">*</span>
                                    <select name="status" class="form-control select2" name="status">
                                        <option value="">Selectionné le status de la license</option>
                                        <option value="disabled">{{ __('Désactivé') }}</option>
                                        <option value="active">{{ __('Activé') }}</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <div class="text-danger"><b>{{ $errors->first('status') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="submit" value="Enregistré" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
