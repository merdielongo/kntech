<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Models\Offer;
use App\Repositories\CurrencyRepository;
use App\Repositories\OfferRepository;
use App\Services\LicenseService;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OfferController extends Controller
{

    protected $repository;

    public function __construct(OfferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() : View {
        $offers = $this->repository->getAll();
        return view('admin.offers.index', [
            'offers' => $offers
        ]);
    }

    public function create() : View {
        $currencies = (new CurrencyRepository())->getAll();
        return view('admin.offers.create', [
            'currencies' => $currencies
        ]);
    }

    public function show(Offer $offer, LicenseService $licenseService) : View {
        $licenses = $licenseService->getInOffer($offer);
        return view('admin.offers.show', [
            'offer' => $offer,
            'licenses' => $licenses
        ]);
    }

    public function store(CreateOfferRequest $request, OfferService $offerService) {
        $offer = $offerService->create($request);
        return redirect()->route('offers.index')->with('success', $offer->name.' a été enregustrer avec success');
    }

    public function active(Offer $offer, bool $status, OfferService $offerService) {
        $offerService->active($offer, $status);
        return redirect()->route('offers.index')->with('success', 'Le status a ete modifier');
    }

    public function publish(Offer $offer, bool $publish) {
        $offer->is_publish = $publish;
        $offer->save();
        return redirect()->route('offers.index')->with('success', 'L\'offre vient d\'être publié');
    }


}
