<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\purchase;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{

    public function index()
    {

        $purchases = purchase::orderBy('id', 'desc')->paginate(5);
        return view('admin.purchasses', ['purchase' => purchase]);

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(purchase $purchase)
    {
        //
    }


    public function edit(purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchase $purchase)
    {
        //
    }
}
