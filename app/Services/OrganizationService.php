<?php

namespace App\Services;

use App\Http\Requests\CreateOrganizationRequest;
use App\Models\Organization;
use App\Repositories\OrganizationRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class OrganizationService
{

    protected $organizationRepository;

    public function __construct() {
        $this->organizationRepository = new OrganizationRepository();
    }


    public function create(CreateOrganizationRequest $request, $path_logo) : Organization {
        DB::beginTransaction();
        $organization = $this->organizationRepository->store([
            'owner_id' => $request->input('owner'),
            'manager_id' => $request->input('manager'),
            'township_id' => $request->input('township'),
            'address_id' => $request->input('address'),
            'name' => $request->input('name'),
            'organization_type_id' => $request->input('type'),
            'status' => $request->input('status'),
            'logo' => $path_logo,
        ]);
        DB::commit();
        return $organization;
    }

    public function uploadLogo(FormRequest $request): ?string
    {
        if($request->file('logo')){
            $imgPath = $request->file('logo');
            $imgName = $request->input('name').'-'.time().''.$imgPath->getClientOriginalName();
            $path = $request->file('logo')->move(public_path('images/organizations/logos'), $imgName);
            return $path;
        }
    }


}
