<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{

    public function store(Request $request)
    {
        //
    }


    public function show($provinceCode)
    {
        $districts = District::where('provincecode', '=', $provinceCode)->get();
        return response()->json($districts, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\District $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\District $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\District $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
