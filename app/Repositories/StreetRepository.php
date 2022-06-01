<?php

namespace App\Repositories;

use App\Models\Street;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StreetRepository
{
    /**
     * The Street model.
     *
     * @var Street
     */
    protected $street;

    /**
     * StreetRepository constructor.
     *
     * @param Street|null $street
     */
    public function __construct(Street $street = null)
    {
        $this->street = $street ?? new Street();
    }

    /**
     * Retrieve a specified street from database by id.
     *
     * @param $id
     * @return Street
     */
    public function getById($id)
    {
        return $this->street->findOrFail($id);
    }

    /**
     * Retrieve all street from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->street->all();
    }

    /**
     * Get a list of street by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->street->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->street->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a street from database by a field according to a given value.
     *
     * @return Street
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->street->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of street from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->street->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of street from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->street->where($constraints)->get();
    }

    /**
     * Store a new street in the database.
     *
     * @param array $inputs
     * @return Street
     */
    public function store(array $inputs)
    {
        return $this->street->create($inputs);
    }

    /**
     * Update a street
     *
     * @return Street
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
     * Remove a street from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}