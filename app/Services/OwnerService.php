<?php

namespace App\Services;

use App\Http\Requests\CreateOwnerRequest;
use App\Models\Owner;
use App\Repositories\AddressRepository;
use App\Repositories\CityRepository;
use App\Repositories\ContactRepository;
use App\Repositories\CountryRepository;
use App\Repositories\OwnerRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\TownshipRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class OwnerService
{

    protected OwnerRepository $ownerRepository;
    protected UserRepository $userRepository;
    protected ContactRepository $contactRepository;
    protected CountryRepository $countryRepository;
    protected ProvinceRepository $provinceRepository;
    protected CityRepository $cityRepository;
    protected TownshipRepository $townshipRepository;
    protected AddressRepository $addressRepository;

    public function __construct() {
        $this->ownerRepository = new OwnerRepository();
        $this->userRepository = new UserRepository();
        $this->contactRepository = new ContactRepository();
        $this->countryRepository = new CountryRepository();
        $this->provinceRepository = new ProvinceRepository();
        $this->cityRepository = new CityRepository();
        $this->townshipRepository = new TownshipRepository();
        $this->addressRepository = new AddressRepository();
    }


    public function create(CreateOwnerRequest $request, ...$roles) : Owner {
        DB::beginTransaction();
        // create contact
        $contact = $this->contactRepository->store([
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'first_name' => $request->input('first_name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'township_id' => $request->input('township'),
            'address' => $request->input('address')
        ]);

        // create user
        $user = $this->userRepository->store([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('email')),
            'contact_id' => $contact->id
        ]);

        // create owner
        $owner = $this->ownerRepository->store([
            'user_id' => $user->id,
            'contact_id' => $contact->id,
            'is_active' => false,
            'authorization' => false
        ]);

        // update password
        $this->userRepository->update([
            'password' => bcrypt($user->kn_id)
        ], $user->id);

        // add models in contact
        $this->contactRepository->update([
            'model_id' => $owner->id,
            'model' => Owner::class
        ], $contact->id);

        // Assign role
        $user->assignRole($roles);
        DB::commit();
        return $owner;
    }

    public function active(Owner $owner, bool $status) : Owner {
        $owner->is_active = $status ? true : false ?? false;
        $owner->status = $status ? 'active' : 'disabled' ?? 'suspended';
        $owner->save();
        return $owner;
    }

}
