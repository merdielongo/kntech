@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
                    <div class="col-12">
                        <h3 class="card-title">{{ __('Creation d\'une organization') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('organizations.store') }}" method="POST" class="row" enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                {{ $errors }}
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Nom de l'organization</b></label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Entre le nom de l'organization" value="{{ old('name') }}" name="name">
                                    @if ($errors->has('name'))
                                        <div class="text-danger"><b>{{ $errors->first('name') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Status</b></label>  <span class="text-danger">*</span>
                                    <select name="status" class="form-control select2" name="status">
                                        <option value="">Selectionné le status de l'organization</option>
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
                                    <label><b>Logo</b></label>
                                    <input type="file" class="form-control" name="logo" value="{{ old('logo') }}">
                                    @if ($errors->has('logo'))
                                        <div class="text-danger"><b>{{ $errors->first('logo') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Propriétaire</b></label>  <span class="text-danger">*</span>
                                    <select name="owner" class="form-control select2-show-search " data-placeholder="Choose one (with optgroup)" class="owner_id">
                                        <option value="">Selectionné un propriétaire</option>
                                       @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}">{{ $owner->contact->full_name }}</option>
                                       @endforeach
                                    </select>
                                    @if ($errors->has('owner'))
                                         <div class="text-danger"><b>{{ $errors->first('owner') }}</b></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><b>Manager</b></label>
                                    <select name="manager" class="form-control select2-show-search " data-placeholder="Choose one (with optgroup)" class="manager">
                                        <option value="">Selectionné un manager</option>
                                       @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->contact->full_name }}</option>
                                       @endforeach
                                    </select>
                                    @if ($errors->has('manager'))
                                         <div class="text-danger"><b>{{ $errors->first('manager') }}</b></div>
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
