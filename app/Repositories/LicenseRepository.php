<?php

namespace App\Repositories;

use App\Models\License;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LicenseRepository
{
    /**
     * The License model.
     *
     * @var License
     */
    protected $license;

    /**
     * LicenseRepository constructor.
     *
     * @param License|null $license
     */
    public function __construct(License $license = null)
    {
        $this->license = $license ?? new License();
    }

    /**
     * Retrieve a specified license from database by id.
     *
     * @param $id
     * @return License
     */
    public function getById($id)
    {
        return $this->license->findOrFail($id);
    }

    /**
     * Retrieve all license from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->license->all();
    }

    /**
     * Get a list of license by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->license->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->license->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a license from database by a field according to a given value.
     *
     * @return License
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->license->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of license from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->license->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of license from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->license->where($constraints)->get();
    }

    /**
     * Store a new license in the database.
     *
     * @param array $inputs
     * @return License
     */
    public function store(array $inputs)
    {
        return $this->license->create($inputs);
    }

    /**
     * Update a license
     *
     * @return License
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
     * Remove a license from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}