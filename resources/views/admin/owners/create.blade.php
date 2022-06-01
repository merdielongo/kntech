@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-12">
                        <h3 class="card-title">{{ __('Creation du propreitaire') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('owners.store') }}" method="POST" class="row">
                            @csrf

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Nom') }}</b></label>  <span class="text-danger">*</span>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Écrivez votre nom" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Post-nom') }}</b></label>
                                    <input type="text" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Écrivez votre post-nom" name="middle_name" value="{{ old('middle_name') }}">
                                    @error('middle_name')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Pré-nom') }}</b></label>  <span class="text-danger">*</span>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Écrivez votre pré-nom" name="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Genre</b></label>  <span class="text-danger">*</span>
                                    <select name="gender" class="form-control select2 @error('gender') is-invalid @enderror" name="gender">
                                        <option value="">Selectionné votre genre</option>
                                        <option value="m">{{ __('Masculin') }}</option>
                                        <option value="f">{{ __('Feminin') }}</option>
                                    </select>
                                </div>
                               @if ($errors->has('gender'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                               @endif
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Téléphone') }}</b></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Écrivez votre phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Email') }}</b></label>  <span class="text-danger">*</span>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Écrivez votre email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Pays</b></label>  <span class="text-danger">*</span>
                                    <select name="country" class="form-control select2 @error('country') is-invalid @enderror" name="country">
                                        <option value="">Selectionné votre pays d'origine</option>
                                       @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                               @if ($errors->has('country'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                               @endif
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Province </b></label>
                                    <select name="province" class="form-control select2 @error('province') is-invalid @enderror" name="province">
                                        <option value="">Selectionné votre province</option>
                                       @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                               @if ($errors->has('province'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                               @endif
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Ville</b></label>  <span class="text-danger">*</span>
                                    <select name="city" class="form-control select2 @error('city') is-invalid @enderror" name="city">
                                        <option value="">Selectionné votre ville</option>
                                       @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                               @if ($errors->has('city'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                               @endif
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Commune</b></label>
                                    <select name="township" class="form-control select2 @error('township') is-invalid @enderror" name="township">
                                        <option value="">Selectionné votre pays d'origine</option>
                                        @foreach ($townships as $township)
                                        <option value="{{ $township->id }}">{{ $township->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               @if ($errors->has('township'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('township') }}</strong>
                                    </span>
                               @endif
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Avenue</b></label>
                                    <select name="street" class="form-control select2 @error('street') is-invalid @enderror" name="street">
                                        <option value="">Selectionné votre avenu</option>
                                        @foreach ($streets as $street)
                                        <option value="{{ $street->id }}">{{ $street->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               @if ($errors->has('street'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                               @endif
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="form-group">
                                    <label><b>Adresse</b></label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Adresse">
                                </div>
                               @if ($errors->has('address'))
                                    <span class="invalid-feedback mt-3">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                               @endif
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
