<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionRequest;
use App\Repositories\SessionRepository;
use App\Services\SessionService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SessionController extends Controller
{

    protected $repository;

    public function __construct(SessionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() : View {
        $sessions = $this->repository->getAll();
        return view('admin.sessions.index', [
            'sessions' => $sessions
        ]);
    }

    public function create() : View {
        return view('admin.sessions.create');
    }

    public function store(CreateSessionRequest $request, SessionService $sessionService) {
        $session = $sessionService->create($request);
        redirect()->route('sessions.index')->with('success', 'La session a été enregister');
    }


}
