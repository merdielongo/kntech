<?php

namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CurrencyRepository
{
    /**
     * The Currency model.
     *
     * @var Currency
     */
    protected $currency;

    /**
     * CurrencyRepository constructor.
     *
     * @param Currency|null $currency
     */
    public function __construct(Currency $currency = null)
    {
        $this->currency = $currency ?? new Currency();
    }

    /**
     * Retrieve a specified currency from database by id.
     *
     * @param $id
     * @return Currency
     */
    public function getById($id)
    {
        return $this->currency->findOrFail($id);
    }

    /**
     * Retrieve all currency from database.
     *
     * @return Collection|static[]
     */
    public function getAll()
    {
        return $this->currency->all();
    }

    /**
     * Get a list of currency by pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginate($n = 15)
    {
        return $this->currency->paginate($n);
    }

    /**
     * Check if an instance exists according to a given value.
     *
     * @return bool
     */
    public function exists($field, $value, $condition = '=')
    {
        return $this->currency->where($field, $condition, $value)->exists();
    }

    /**
     * Retrieve a currency from database by a field according to a given value.
     *
     * @return Currency
     */
    public function get($field, $value, $condition = '=')
    {
        return $this->currency->where($field, $condition, $value)->firstOrFail();
    }

    /**
     * Retrieve a listing of currency from database according to constraints by pagination.
     *
     * @param array $constraints
     * @param int $n
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getListByPagination(array $constraints, $n = 30)
    {
        return $this->currency->where($constraints)->paginate($n);
    }

    /**
     * Retrieve a listing of currency from database according to constraints.
     *
     * @param array $constraints
     * @return Collection|static[]
     */
    public function getList(array $constraints)
    {
        return $this->currency->where($constraints)->get();
    }

    /**
     * Store a new currency in the database.
     *
     * @param array $inputs
     * @return Currency
     */
    public function store(array $inputs)
    {
        return $this->currency->create($inputs);
    }

    /**
     * Update a currency
     *
     * @return Currency
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
     * Remove a currency from database.
     *
     * @return void
     */
    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    //
}