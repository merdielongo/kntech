<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CityRepository
{
    /**
     * The City model.
     *
     * @var City
     */
    protected $city;

    /**
     * CityRepository constructor.
     *
     * @param City|null $city
     */
    public function __construct(City $city = null)
    {
        $this->city = $city ?? new City();
    }

    /**
     * Retrieve a specified city from database by id.
     *
     * @param $id
     * @return City
     */
    public function getById($id)
    {
        return $this->city->findOrFail($id);
    }

    /**
     * Retrieve all city from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->city->all();
    }

    /**
     * Get a list of city by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->city->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->city->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a city from database by a field according to a given value.
     *
     * @return City
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->city->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of city from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->city->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of city from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->city->where($constraints)->get();
    }

    /**
     * Store a new city in the database.
     *
     * @param array $inputs
     * @return City
     */
    public function store(array $inputs)
    {
        return $this->city->create($inputs);
    }

    /**
     * Update a city
     *
     * @return City
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
     * Remove a city from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}