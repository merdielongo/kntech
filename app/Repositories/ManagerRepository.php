<?php

namespace App\Repositories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ManagerRepository
{
    /**
     * The Manager model.
     *
     * @var Manager
     */
    protected $manager;

    /**
     * ManagerRepository constructor.
     *
     * @param Manager|null $manager
     */
    public function __construct(Manager $manager = null)
    {
        $this->manager = $manager ?? new Manager();
    }

    /**
     * Retrieve a specified manager from database by id.
     *
     * @param $id
     * @return Manager
     */
    public function getById($id)
    {
        return $this->manager->findOrFail($id);
    }

    /**
     * Retrieve all manager from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->manager->all();
    }

    /**
     * Get a list of manager by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->manager->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->manager->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a manager from database by a field according to a given value.
     *
     * @return Manager
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->manager->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of manager from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->manager->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of manager from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->manager->where($constraints)->get();
    }

    /**
     * Store a new manager in the database.
     *
     * @param array $inputs
     * @return Manager
     */
    public function store(array $inputs)
    {
        return $this->manager->create($inputs);
    }

    /**
     * Update a manager
     *
     * @return Manager
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
     * Remove a manager from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}