<?php

namespace App\Repositories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OwnerRepository
{
    /**
     * The Owner model.
     *
     * @var Owner
     */
    protected $owner;

    /**
     * OwnerRepository constructor.
     *
     * @param Owner|null $owner
     */
    public function __construct(Owner $owner = null)
    {
        $this->owner = $owner ?? new Owner();
    }

    /**
     * Retrieve a specified owner from database by id.
     *
     * @param $id
     * @return Owner
     */
    public function getById($id)
    {
        return $this->owner->findOrFail($id);
    }

    /**
     * Retrieve all owner from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->owner->all();
    }

    /**
     * Get a list of owner by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->owner->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->owner->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a owner from database by a field according to a given value.
     *
     * @return Owner
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->owner->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of owner from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->owner->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of owner from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->owner->where($constraints)->get();
    }

    /**
     * Store a new owner in the database.
     *
     * @param array $inputs
     * @return Owner
     */
    public function store(array $inputs)
    {
        return $this->owner->create($inputs);
    }

    /**
     * Update a owner
     *
     * @return Owner
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
     * Remove a owner from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}