<?php

namespace App\Services;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     *
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var ContactRepository
     */
    protected ContactRepository $contactRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->contactRepository = new ContactRepository();
    }

    public function create(FormRequest $request, ...$roles) : User {
        DB::beginTransaction();
        // create contact
        $contact = $this->contactRepository->store([
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'first_name' => $request->input('first_name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ]);

        // create user
        $user = $this->userRepository->store([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'contact_id' => $contact->id
        ]);

        // add models in contact
        $this->contactRepository->update([
            'model_id' => $user->id,
            'model' => User::class
        ], $contact->id);

        // Assign role
        $user->assignRole($roles);
        DB::commit();
        return $user;
    }

}
