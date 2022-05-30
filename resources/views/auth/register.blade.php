
@extends('layouts.guest')

@section('title-page')
    Register
@endsection

@section('content')

    <div class="row mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 75%">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ __('Inscription') }}</h4>

                    {{ $errors }}

                       @if ($errors->has('error'))
                            <div class="alert alert-danger text-center">
                                {{ $errors->first('error') }}
                            </div>
                       @endif

                        <form action="{{ route('user.store') }}" method="POST" class="row">
                            @csrf

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Nom') }}</b></label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Écrivez votre nom" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
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

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Pré-nom') }}</b></label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Écrivez votre pré-nom" name="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
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

                            <div class="col-lg-6 col-md-6 col-12">
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

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Email') }}</b></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Écrivez votre email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Mot de passe') }}</b></label>
                                    <input type="password" class="form-control" placeholder="Écrivez votre nouveau mot de passe" name="password">
                                    @error('password')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label><b>{{ __('Confirmer') }}</b></label>
                                    <input type="password" class="form-control" placeholder="Écrivez encore votre votre mot de passe" name="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" value="S'inscrire" class="btn btn-primary" style="width: 25%">
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>

@endsection

