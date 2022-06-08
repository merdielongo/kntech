<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationRequest;
use App\Models\Organization;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\OwnerRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\StreetRepository;
use App\Repositories\TownshipRepository;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganizationController extends Controller
{

    protected $repository;
    protected $countryRepository;
    protected $provinceRepository;
    protected $cityRepository;
    protected $townshipRepository;
    protected $streetRepository;

    public function __construct(OrganizationRepository $repository, CountryRepository $countryRepository, ProvinceRepository $provinceRepository, CityRepository $cityRepository, TownshipRepository $townshipRepository, StreetRepository $streetRepository)
    {
        $this->repository = $repository;
        $this->countryRepository = $countryRepository;
        $this->provinceRepository = $provinceRepository;
        $this->cityRepository = $cityRepository;
        $this->townshipRepository = $townshipRepository;
        $this->streetRepository = $streetRepository;
    }

    public function index() : View {
        $organizations = $this->repository->getAll();
        return view('admin.organizations.index', [
            'organizations' => $organizations
        ]);
    }

    public function create() : View {
        $owners = (new OwnerRepository())->getAll();
        $managers = (new ManagerRepository())->getAll();
        return view('admin.organizations.create', [
            'owners' => $owners,
            'managers' => $managers
        ]);
    }

    public function show(Organization $organization, OrganizationService $organizationService) : View {
        $licenses = $organizationService->getByAllLicense($organization);
        return view('admin.organizations.show', [
            'organization' => $organization,
            'licenses' => $licenses
        ]);
    }

    public function createManagerOrganization(Organization $organization) : View {
        return view('admin.managers.create', [
            'organization' => $organization,
            'countries' => $this->countryRepository->getAll(),
            'provinces' => $this->provinceRepository->getAll(),
            'cities' => $this->cityRepository->getAll(),
            'townships' => $this->townshipRepository->getAll(),
            'streets' => $this->streetRepository->getAll()
        ]);
    }

    public function store(CreateOrganizationRequest $request, OrganizationService $organizationService) {
        $logo = $organizationService->uploadLogo($request);
        $organization = $organizationService->create($request, $logo);
        return redirect()->route('organizations.index')->with('success', $organization->name.' a été enregistrer avec success');
    }

}
