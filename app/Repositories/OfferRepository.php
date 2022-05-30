<?php

namespace App\Repositories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OfferRepository
{
    /**
     * The Offer model.
     *
     * @var Offer
     */
    protected $offer;

    /**
     * OfferRepository constructor.
     *
     * @param Offer|null $offer
     */
    public function __construct(Offer $offer = null)
    {
        $this->offer = $offer ?? new Offer();
    }

    /**
     * Retrieve a specified offer from database by id.
     *
     * @param $id
     * @return Offer
     */
    public function getById($id)
    {
        return $this->offer->findOrFail($id);
    }

    /**
     * Retrieve all offer from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->offer->all();
    }

    /**
     * Get a list of offer by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->offer->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->offer->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a offer from database by a field according to a given value.
     *
     * @return Offer
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->offer->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of offer from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->offer->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of offer from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->offer->where($constraints)->get();
    }

    /**
     * Store a new offer in the database.
     *
     * @param array $inputs
     * @return Offer
     */
    public function store(array $inputs)
    {
        return $this->offer->create($inputs);
    }

    /**
     * Update a offer
     *
     * @return Offer
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
     * Remove a offer from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}