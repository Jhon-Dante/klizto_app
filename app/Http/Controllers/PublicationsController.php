<?php

namespace App\Http\Controllers;

use App\Models\publications;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Buyer/Publications/PublicationsComponent');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function show(publications $publications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function edit(publications $publications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, publications $publications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function destroy(publications $publications)
    {
        //
    }
}
