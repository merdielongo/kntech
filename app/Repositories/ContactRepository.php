<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ContactRepository
{
    /**
     * The Contact model.
     *
     * @var Contact
     */
    protected $contact;

    /**
     * ContactRepository constructor.
     *
     * @param Contact|null $contact
     */
    public function __construct(Contact $contact = null)
    {
        $this->contact = $contact ?? new Contact();
    }

    /**
     * Retrieve a specified contact from database by id.
     *
     * @param $id
     * @return Contact
     */
    public function getById($id)
    {
        return $this->contact->findOrFail($id);
    }

    /**
     * Retrieve all contact from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->contact->all();
    }

    /**
     * Get a list of contact by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->contact->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->contact->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a contact from database by a field according to a given value.
     *
     * @return Contact
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->contact->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of contact from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->contact->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of contact from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->contact->where($constraints)->get();
    }

    /**
     * Store a new contact in the database.
     *
     * @param array $inputs
     * @return Contact
     */
    public function store(array $inputs)
    {
        return $this->contact->create($inputs);
    }

    /**
     * Update a contact
     *
     * @return Contact
     */
    public function update(array $inputs, $id)
    {
        $instance = $this->getById($id);
        foreach($inputs as $property => $value)
            $instance->$property = $value;
        $instance->save();
        return $this->getById($id);
    }

    /**
     * Remove a contact from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}