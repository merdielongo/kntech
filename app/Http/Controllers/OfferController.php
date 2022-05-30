<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Repositories\CurrencyRepository;
use App\Repositories\OfferRepository;
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

    public function store(CreateOfferRequest $request, OfferService $offerService) {
        $offer = $offerService->create($request);
        return redirect()->route('offers.index')->with('success', $offer->name.' a été enregustrer avec success');
    }


}
