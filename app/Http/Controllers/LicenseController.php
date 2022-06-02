<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLicenseRequest;
use App\Repositories\LicenseRepository;
use App\Repositories\OfferRepository;
use App\Repositories\OrganizationRepository;
use App\Services\LicenseService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LicenseController extends Controller
{

    protected $repository;

    public function __construct(LicenseRepository $repository) {
        $this->repository = $repository;
    }

    public function index() : View {
        $licenses = $this->repository->getAll();
        return view('admin.licenses.index', [
            'licenses' => $licenses
        ]);
    }

    public function create() : View {
        $organizations = (new OrganizationRepository())->getAll();
        $offers = (new OfferRepository())->getAll();
        return view('admin.licenses.create', [
            'organizations' => $organizations,
            'offers' => $offers
        ]);
    }

    public function store(CreateLicenseRequest $request, LicenseService $licenseService) {
        $licenseService->create($request);
        return redirect()->route('licenses.index')->with(
            'success',
            'la licence a ete enregistrer'
        );
    }

}
