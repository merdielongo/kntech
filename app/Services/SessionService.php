<?php

namespace App\Services;

use App\Http\Requests\CreateSessionRequest;
use App\Models\Session;
use App\Repositories\SessionRepository;
use Illuminate\Support\Facades\DB;

class SessionService
{

    protected SessionRepository $sessionRepository;

    public function __construct()
    {
        $this->sessionRepository = new SessionRepository();
    }


    public function create(CreateSessionRequest $request) : Session {
        DB::beginTransaction();
        $session = $this->sessionRepository->store([
            'status' => $request->input('status'),
            'started_at' => $request->input('started_at'),
            'ending_at' => $request->input('ending_at')
        ]);
        DB::commit();
        return $session;
    }

}
