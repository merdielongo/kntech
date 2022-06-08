<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompnentRequest;
use App\Http\Requests\UpdateCompnentRequest;
use App\Models\Compnent;

class CompnentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompnentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompnentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compnent  $compnent
     * @return \Illuminate\Http\Response
     */
    public function show(Compnent $compnent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compnent  $compnent
     * @return \Illuminate\Http\Response
     */
    public function edit(Compnent $compnent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompnentRequest  $request
     * @param  \App\Models\Compnent  $compnent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompnentRequest $request, Compnent $compnent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compnent  $compnent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compnent $compnent)
    {
        //
    }
}
