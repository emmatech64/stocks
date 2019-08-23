<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use App\Supplier;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->get();
        $suppliers = Supplier::orderBy('id', 'desc')->get();

        if (empty($request->input('q'))) {
            $stocks = Stock::orderBy('id', 'desc')->paginate(10);
        } else {
            $q = $request->input('q');
            $stocks = Stock::with('supplier')
                ->where('supplier.name', 'LIKE', "%{$q}%")
                ->orderBy("id", "desc")
                ->paginate(10);
            $stocks->appends(['q' => $q]);
        }
        return view('admin.stocks', ['stocks' => $stocks, 'products' => $products, 'suppliers' => $suppliers]);
    }

    public function store(Request $request)
    {
        if ($request->id && $request->id > 0) {
            $stock = Stock::with('product')->find($request->id);
            if ($stock) {

                // update stock product qty
                $this->updateProductQtyWhenEditStockItem($request, $stock);

                $stock->supplier_id = $request->supplier_id;
                $stock->product_id = $request->product_id;
                $stock->qty = $request->qty;
                $stock->update();
            }
        } else {
            $stock = new Stock();
            $stock->supplier_id = $request->supplier_id;
            $stock->product_id = $request->product_id;
            $stock->qty = $request->qty;
            $stock->save();
            // update stock product qty
            $this->updateProductQtyWhenStockingItem($stock);
        }
        return response()->json($stock, 200);
    }
    /**
     * @param Request $request
     * @param $stock
     */
    private function updateProductQtyWhenEditStockItem(Request $request, $stock): void
    {
        $prevSupQty = $stock->qty;
        $newSupQty = $request->qty;
        $prodQty = $stock->product->qty;
        $newProdQty = ($prodQty - $prevSupQty) + $newSupQty;
        $stock->product->qty = $newProdQty;
        $stock->product->update();
    }
    /**
     * @param Stock $stock
     */
    public function updateProductQtyWhenStockingItem(Stock $stock): void
    {
        $stock->product->qty += $stock->qty;
        $stock->product->update();
    }

    public function show(Stock $stock)
    {
        return response()->json($stock, 200);
    }


    public function destroy(Stock $stock)
    {
        $stock->delete();
        return response()->json(null, 204);
    }



}
