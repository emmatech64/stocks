<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.categories', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        if ($request->id && $request->id > 0) {
            $cat = Category::find($request->id);
            if ($cat) {
                $cat->name = $request->name;
                $cat->update();
            }
        } else {
            // Category::create([
            //     'name' => $request->name,
            // ]);

            $cat = new Category();
            $cat->name = $request->name;
            $cat->save();
        }
        return redirect()->route('categories.all');
    }


    public function show(Category $category)
    {
        return response()->json($category, 200);
    }


    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([], 204);
    }
}
