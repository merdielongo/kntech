<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateManagerRequest;
use App\Models\Manager;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\StreetRepository;
use App\Repositories\TownshipRepository;
use App\Services\ManagerService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagerController extends Controller
{

    protected $repository;

    public function __construct(ManagerRepository $repository) {
        $this->repository = $repository;
    }

    public function index() : View {
        $managers = $this->repository->getAll();
        return view('admin.managers.index', [
            'managers' => $managers
        ]);
    }

    public function create() : View {
        $countries = (new CountryRepository())->getAll();
        $provinces = (new ProvinceRepository())->getAll();
        $cities = (new CityRepository())->getAll();
        $townships = (new  TownshipRepository())->getAll();
        $streets = (new StreetRepository())->getAll();
        return view('admin.managers.create', [
            'countries' => $countries,
            'provinces' => $provinces,
            'cities' => $cities,
            'townships' => $townships,
            'streets' => $streets
        ]);
    }

    public function store(CreateManagerRequest $request, ManagerService $managerService) {
        $manager = $managerService->create($request, 'manager');
        return redirect()->route('managers.index')->with(
            'success',
            $manager->contact->full_name. 'a été enregistrer avec success'
        );
    }

    public function active(Manager $manager, bool $status, ManagerService $managerService) {
        $managerService->active($manager, $status);
        return redirect()->route('managers.index')->with('success', 'Le status a ete modifier');
    }

}
