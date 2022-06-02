<?php

namespace App\Repositories;

use App\Models\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SessionRepository
{
    /**
     * The Session model.
     *
     * @var Session
     */
    protected $session;

    /**
     * SessionRepository constructor.
     *
     * @param Session|null $session
     */
    public function __construct(Session $session = null)
    {
        $this->session = $session ?? new Session();
    }

    /**
     * Retrieve a specified session from database by id.
     *
     * @param $id
     * @return Session
     */
    public function getById($id)
    {
        return $this->session->findOrFail($id);
    }

    /**
     * Retrieve all session from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->session->all();
    }

    /**
     * Get a list of session by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->session->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->session->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a session from database by a field according to a given value.
     *
     * @return Session
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->session->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of session from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->session->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of session from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->session->where($constraints)->get();
    }

    /**
     * Store a new session in the database.
     *
     * @param array $inputs
     * @return Session
     */
    public function store(array $inputs)
    {
        return $this->session->create($inputs);
    }

    /**
     * Update a session
     *
     * @return Session
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
     * Remove a session from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}