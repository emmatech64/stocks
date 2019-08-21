<?php

namespace App\Http\Controllers;

use App\Village;
use Illuminate\Http\Request;

class VillagesController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Village $village)
    {
        $villages = Village::where('codecell','=', $codecell)-get();
        return response()->json($village,200);

    }

    public function edit(Village $village)
    {
        //
    }

    public function update(Request $request, Village $village)
    {
        //
    }


    public function destroy(Village $village)
    {
        //
    }
}
