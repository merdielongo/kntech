<?php

namespace App\Repositories;

use App\Models\Township;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TownshipRepository
{
    /**
     * The Township model.
     *
     * @var Township
     */
    protected $township;

    /**
     * TownshipRepository constructor.
     *
     * @param Township|null $township
     */
    public function __construct(Township $township = null)
    {
        $this->township = $township ?? new Township();
    }

    /**
     * Retrieve a specified township from database by id.
     *
     * @param $id
     * @return Township
     */
    public function getById($id)
    {
        return $this->township->findOrFail($id);
    }

    /**
     * Retrieve all township from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->township->all();
    }

    /**
     * Get a list of township by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->township->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->township->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a township from database by a field according to a given value.
     *
     * @return Township
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->township->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of township from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->township->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of township from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->township->where($constraints)->get();
    }

    /**
     * Store a new township in the database.
     *
     * @param array $inputs
     * @return Township
     */
    public function store(array $inputs)
    {
        return $this->township->create($inputs);
    }

    /**
     * Update a township
     *
     * @return Township
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
     * Remove a township from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}