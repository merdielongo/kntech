@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-12">
                        <h3 class="card-title">{{ __('Creation d\'une offre') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('offers.store') }}" method="POST" class="row">
                            @csrf

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Nom de l'offre</b></label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Entre le nom de l'offres a publier" value="{{ old('name') }}" name="name">
                                    @if ($errors->has('name'))
                                        <div class="text-danger"><b>{{ $errors->first('name') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Description de l'offre</b></label>
                                    <input type="text" class="form-control" placeholder="Entre le nom de l'offres a publier" value="{{ old('description') }}" name="description">
                                    @if ($errors->has('description'))
                                        <div class="text-danger"><b>{{ $errors->first('description') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Status</b></label>  <span class="text-danger">*</span>
                                    <select name="status" class="form-control select2" name="status">
                                        <option value="">Selectionné le status de l'offre</option>
                                        <option value="disabled">{{ __('Désactivé') }}</option>
                                        <option value="active">{{ __('Activé') }}</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <div class="text-danger"><b>{{ $errors->first('status') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Proposition</b></label>  <span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Entre une nouvelle proposition" value="{{ old('propositions') }}" name="propositions">
                                    @if ($errors->has('propositions'))
                                        <div class="text-danger"><b>{{ $errors->first('propositions') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Prix</b></label>  <span class="text-danger">*</span>
                                    <input type="number" class="form-control" placeholder="Entre le prix de l'offre" name="price" value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                        <div class="text-danger"><b>{{ $errors->first('price') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Money</b></label>  <span class="text-danger">*</span>
                                    <select name="currency" class="form-control select2-show-search " data-placeholder="Choose one (with optgroup)" class="currency_id">
                                        <option value="">Selectionné une money</option>
                                       @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}"> ({{ $currency->symbol }}) {{ $currency->name }}</option>
                                       @endforeach
                                    </select>
                                    @if ($errors->has('currency'))
                                         <div class="text-danger"><b>{{ $errors->first('currency') }}</b></div>
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
