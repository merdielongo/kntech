<?php

namespace App\Services;

use App\Http\Requests\CreateLicenseRequest;
use App\Models\License;
use App\Repositories\LicenseRepository;
use Illuminate\Support\Facades\DB;

class LicenseService
{

    protected LicenseRepository $licenseRepository;

    public function __construct() {
        $this->licenseRepository = new LicenseRepository();
    }


    public function create(CreateLicenseRequest $request) : License {
        DB::beginTransaction();
        $license = $this->licenseRepository->store([
            'organization_id' => $request->input('organization'),
            'offer_id' => $request->input('offer'),
            'days' => $request->input('days'),
            'expiration_at' => $request->input('expiration_at'),
            'beginning_license' => $request->input('beginning_license'),
            'end_license' => $request->input('end_license')
        ]);
        DB::commit();
        return $license;
    }


}
