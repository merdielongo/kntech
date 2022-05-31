<?php

namespace App\Http\Controllers;

use App\Repositories\OwnerRepository;
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

    // public function create() : View {
    //     // return view()
    // }

}
