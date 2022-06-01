<?php

namespace App\Repositories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AddressRepository
{
    /**
     * The Address model.
     *
     * @var Address
     */
    protected $address;

    /**
     * AddressRepository constructor.
     *
     * @param Address|null $address
     */
    public function __construct(Address $address = null)
    {
        $this->address = $address ?? new Address();
    }

    /**
     * Retrieve a specified address from database by id.
     *
     * @param $id
     * @return Address
     */
    public function getById($id)
    {
        return $this->address->findOrFail($id);
    }

    /**
     * Retrieve all address from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->address->all();
    }

    /**
     * Get a list of address by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->address->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->address->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a address from database by a field according to a given value.
     *
     * @return Address
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->address->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of address from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->address->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of address from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->address->where($constraints)->get();
    }

    /**
     * Store a new address in the database.
     *
     * @param array $inputs
     * @return Address
     */
    public function store(array $inputs)
    {
        return $this->address->create($inputs);
    }

    /**
     * Update a address
     *
     * @return Address
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
     * Remove a address from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}