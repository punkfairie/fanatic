<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOwnedRequest;
use App\Http\Requests\UpdateOwnedRequest;
use App\Models\Owned;

class OwnedController extends Controller
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
     * @param  \App\Http\Requests\StoreOwnedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owned  $owned
     * @return \Illuminate\Http\Response
     */
    public function show(Owned $owned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owned  $owned
     * @return \Illuminate\Http\Response
     */
    public function edit(Owned $owned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnedRequest  $request
     * @param  \App\Models\Owned  $owned
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnedRequest $request, Owned $owned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owned  $owned
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owned $owned)
    {
        //
    }
}
