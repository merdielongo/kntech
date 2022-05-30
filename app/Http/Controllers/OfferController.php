<?php

namespace App\Http\Controllers;

use App\Repositories\OfferRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferController extends Controller
{

    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function index() : View {
        $offers = $this->offerRepository->getAll();
        return view('admin.offers.index', [
            'offers' => $offers
        ]);
    }


}
