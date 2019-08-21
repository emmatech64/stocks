<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    public function show($districtCode)
    {
        $sectors = Sector::where('districtcode', '=', $districtCode)->get();
        return response()->json($sectors, 200);
    }
}
