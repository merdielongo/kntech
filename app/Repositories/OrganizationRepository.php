<?php

namespace App\Repositories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrganizationRepository
{
    /**
     * The Organization model.
     *
     * @var Organization
     */
    protected $organization;

    /**
     * OrganizationRepository constructor.
     *
     * @param Organization|null $organization
     */
    public function __construct(Organization $organization = null)
    {
        $this->organization = $organization ?? new Organization();
    }

    /**
     * Retrieve a specified organization from database by id.
     *
     * @param $id
     * @return Organization
     */
    public function getById($id)
    {
        return $this->organization->findOrFail($id);
    }

    /**
     * Retrieve all organization from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->organization->all();
    }

    /**
     * Get a list of organization by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->organization->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->organization->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a organization from database by a field according to a given value.
     *
     * @return Organization
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->organization->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of organization from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->organization->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of organization from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->organization->where($constraints)->get();
    }

    /**
     * Store a new organization in the database.
     *
     * @param array $inputs
     * @return Organization
     */
    public function store(array $inputs)
    {
        return $this->organization->create($inputs);
    }

    /**
     * Update a organization
     *
     * @return Organization
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
     * Remove a organization from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}