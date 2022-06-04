<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOwnerRequest;
use App\Models\Owner;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\OwnerRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\StreetRepository;
use App\Repositories\TownshipRepository;
use App\Services\OwnerService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{

    protected $repository;

    public function __construct(OwnerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() : View {
        $owners = $this->repository->getAll();
        return view('admin.owners.index', [
            'owners' => $owners
        ]);
    }

    public function create() : View {
        $countries = (new CountryRepository())->getAll();
        $provinces = (new ProvinceRepository())->getAll();
        $cities = (new CityRepository())->getAll();
        $townships = (new  TownshipRepository())->getAll();
        $streets = (new StreetRepository())->getAll();
        return view('admin.owners.create', [
            'countries' => $countries,
            'provinces' => $provinces,
            'cities' => $cities,
            'townships' => $townships,
            'streets' => $streets
        ]);
    }

    public function show(Owner $owner, OwnerService $ownerService) : View {
        $organization = $ownerService->getByOrganization($owner);
        $organizations = $ownerService->getByAllOrganization($owner);
        return view('admin.owners.show', [
            'owner' => $owner,
            'organization' => $organization,
            'organizations' => $organizations
        ]);
    }

    public function store(CreateOwnerRequest $request, OwnerService $ownerService) {
        $owner = $ownerService->create($request, 'owner');
        return redirect()->route('owners.index')->with('success', $owner->kn_id.' a été enregistrer');
    }


    public function active(Owner $owner, bool $status, OwnerService $ownerService) {
        $ownerService->active($owner, $status);
        return redirect()->route('owners.index')->with('success', 'Le status a ete modifier');
    }

    public function authorized(Owner $owner, bool $authorization) {
        $owner->authorization = $authorization;
        $owner->save();
        return redirect()->route('owners.index')->with('success', 'Authorization accordée');
    }


}
