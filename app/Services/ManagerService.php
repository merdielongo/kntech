<?php

namespace App\Services;

use App\Http\Requests\CreateManagerRequest;
use App\Models\Manager;
use App\Repositories\AddressRepository;
use App\Repositories\CityRepository;
use App\Repositories\ContactRepository;
use App\Repositories\CountryRepository;
use App\Repositories\ManagerRepository;
use App\Repositories\OwnerRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\TownshipRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class ManagerService
{
    protected OwnerRepository $ownerRepository;
    protected UserRepository $userRepository;
    protected ContactRepository $contactRepository;
    protected CountryRepository $countryRepository;
    protected ProvinceRepository $provinceRepository;
    protected CityRepository $cityRepository;
    protected TownshipRepository $townshipRepository;
    protected AddressRepository $addressRepository;
    protected ManagerRepository $managerRepository;

    public function __construct() {
        $this->ownerRepository = new OwnerRepository();
        $this->userRepository = new UserRepository();
        $this->contactRepository = new ContactRepository();
        $this->countryRepository = new CountryRepository();
        $this->provinceRepository = new ProvinceRepository();
        $this->cityRepository = new CityRepository();
        $this->townshipRepository = new TownshipRepository();
        $this->addressRepository = new AddressRepository();
        $this->managerRepository = new ManagerRepository();
    }


    public function create(CreateManagerRequest $request, ...$roles) : Manager {
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

        // create manager
        $manager = $this->managerRepository->store([
            'user_id' => $user->id,
            'contact_id' => $contact->id,
            'is_active' => false,
            'manager_type_id' => $request->input('type')
        ]);

        // update password
        $this->userRepository->update([
            'password' => bcrypt($user->kn_id)
        ], $user->id);

        // add models in contact
        $this->contactRepository->update([
            'model_id' => $manager->id,
            'model' => Manager::class
        ], $contact->id);

        // Assign role
        $user->assignRole($roles);
        DB::commit();
        return $manager;
    }

    public function active(Manager $manager, bool $status) : Manager {
        $manager->is_active = $status ? true : false ?? false;
        $manager->status = $status ? 'active' : 'disabled' ?? 'suspended';
        $manager->save();
        return $manager;
    }
}
