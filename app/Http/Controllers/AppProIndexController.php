<?php

namespace App\Http\Controllers;

use App\Models\AppProIndex;
use Illuminate\Http\Request;

class AppProIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app_pro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app_pro.register');
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
     * @param  \App\Models\AppProIndex  $appProIndex
     * @return \Illuminate\Http\Response
     */
    public function show(AppProIndex $appProIndex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppProIndex  $appProIndex
     * @return \Illuminate\Http\Response
     */
    public function edit(AppProIndex $appProIndex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppProIndex  $appProIndex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppProIndex $appProIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppProIndex  $appProIndex
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppProIndex $appProIndex)
    {
        //
    }
}
