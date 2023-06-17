<?php

namespace App\Http\Controllers;

use App\Models\Tingkatan;
use App\Http\Requests\StoreTingkatanRequest;
use App\Http\Requests\UpdateTingkatanRequest;

class TingkatanController extends Controller
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
     * @param  \App\Http\Requests\StoreTingkatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTingkatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tingkatan  $tingkatan
     * @return \Illuminate\Http\Response
     */
    public function show(Tingkatan $tingkatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tingkatan  $tingkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tingkatan $tingkatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTingkatanRequest  $request
     * @param  \App\Models\Tingkatan  $tingkatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTingkatanRequest $request, Tingkatan $tingkatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tingkatan  $tingkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tingkatan $tingkatan)
    {
        //
    }
}
