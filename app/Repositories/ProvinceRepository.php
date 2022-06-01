<?php

namespace App\Repositories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProvinceRepository
{
    /**
     * The Province model.
     *
     * @var Province
     */
    protected $province;

    /**
     * ProvinceRepository constructor.
     *
     * @param Province|null $province
     */
    public function __construct(Province $province = null)
    {
        $this->province = $province ?? new Province();
    }

    /**
     * Retrieve a specified province from database by id.
     *
     * @param $id
     * @return Province
     */
    public function getById($id)
    {
        return $this->province->findOrFail($id);
    }

    /**
     * Retrieve all province from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->province->all();
    }

    /**
     * Get a list of province by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->province->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->province->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a province from database by a field according to a given value.
     *
     * @return Province
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->province->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of province from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->province->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of province from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->province->where($constraints)->get();
    }

    /**
     * Store a new province in the database.
     *
     * @param array $inputs
     * @return Province
     */
    public function store(array $inputs)
    {
        return $this->province->create($inputs);
    }

    /**
     * Update a province
     *
     * @return Province
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
     * Remove a province from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}