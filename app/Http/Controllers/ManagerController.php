<?php

namespace App\Http\Controllers;

use App\Repositories\ManagerRepository;
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
        return view('admin.managers.create');
    }

}
