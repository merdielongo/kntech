<?php

namespace App\Services;

use App\Http\Requests\CreateOfferRequest;
use App\Models\Offer;
use App\Repositories\LicenseRepository;
use App\Repositories\OfferRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OfferService
{

    /**
     * @var OfferRepository
     */
    protected OfferRepository $offerRepository;

    protected LicenseRepository $licenseRepository;

    public function __construct()
    {
        $this->offerRepository = new OfferRepository();
        $this->licenseRepository = new LicenseRepository();
    }

    /**
     * @param CreateOfferRequest $request
     * @return Offer
     */
    public function create(CreateOfferRequest $request, ...$model) : Offer {
        $offer = $this->offerRepository->store([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'propositions' => $request->input('propositions'),
            'price' => $request->input('price'),
            'currency_id' => $request->input('currency'),
            // $model ?? 'availability_model' => $model::class,
            // $model ?? 'availability_model_id' => $model->id,
            'price' => $request->price
        ]);

        return $offer;
    }

    public function active(Offer $offer, bool $status) : Offer {
        $offer->is_active = $status ? true : false ?? false;
        $offer->status = $status ? 'active' : 'disabled' ?? 'suspended';
        $offer->save();
        return $offer;
    }

}
