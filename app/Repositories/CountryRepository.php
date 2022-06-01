<?php

namespace App\Repositories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CountryRepository
{
    /**
     * The Country model.
     *
     * @var Country
     */
    protected $country;

    /**
     * CountryRepository constructor.
     *
     * @param Country|null $country
     */
    public function __construct(Country $country = null)
    {
        $this->country = $country ?? new Country();
    }

    /**
     * Retrieve a specified country from database by id.
     *
     * @param $id
     * @return Country
     */
    public function getById($id)
    {
        return $this->country->findOrFail($id);
    }

    /**
     * Retrieve all country from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->country->all();
    }

    /**
     * Get a list of country by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->country->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->country->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a country from database by a field according to a given value.
     *
     * @return Country
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->country->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of country from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->country->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of country from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->country->where($constraints)->get();
    }

    /**
     * Store a new country in the database.
     *
     * @param array $inputs
     * @return Country
     */
    public function store(array $inputs)
    {
        return $this->country->create($inputs);
    }

    /**
     * Update a country
     *
     * @return Country
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
     * Remove a country from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}