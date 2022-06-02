<?php

namespace App\Http\Controllers;

use App\Repositories\LicenseRepository;
use App\Repositories\OrganizationRepository;
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
        return view('admin.licenses.create');
    }

}
