<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationRequest;
use App\Models\Organization;
use App\Repositories\ManagerRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\OwnerRepository;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganizationController extends Controller
{

    protected $repository;

    public function __construct(OrganizationRepository $repository)
    {
        $this->repository = $repository;
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

    public function store(CreateOrganizationRequest $request, OrganizationService $organizationService) {
        $logo = $organizationService->uploadLogo($request);
        $organization = $organizationService->create($request, $logo);
        return redirect()->route('organizations.index')->with('success', $organization->name.' a été enregistrer avec success');
    }

    public function active(Organization $organization, bool $status, OrganizationService $organizationService) {
        $organizationService->active($organization, $status);
        return redirect()->route('organizations.index')->with('success', 'Le status a ete modifier');
    }

}
