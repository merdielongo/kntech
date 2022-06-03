@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row p-5">
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

@endsection
