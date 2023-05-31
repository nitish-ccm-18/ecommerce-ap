<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    // Display list of category
    public function index()
    {
        $categories = Category::all();
        return view('vendor.categories.index', ['categories'=>$categories]);
    }

    // Display form for creating category
    public function create()
    {
        return view('vendor.categories.create');
    }

    // Store a newly created Category
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'category_name' => 'required | max:10',
            'category_description' => 'required | max:50'
        ]);

        Category::create([
            'name' => $request->category_name,
            'description' => $request->category_description,
            'status' => TRUE
        ]);
        return redirect('/categories');
    }

    // Display the specified resource
    public function show($id)
    {
        $category = Category::find($id);
        return view('vendor.categories.show', ['category'=>$category]);
    }

    // Display form for update category
    public function editPage($id) 
    {
        $category = Category::find($id);
        return view('vendor.categories.edit', ['category'=>$category]);
    }


    // Update specified
    public function edit(Request $request) 
    {

        // validate data
        $request->validate([
            'category_name' => 'required | max:10',
            'category_description' => 'required | max:50'
        ]);

        $category = Category::find($request->id);
        $category->name = $request->category_name;
        $category->description = $request->category_description;
        $category->save();

        return redirect('/categories');
    }


    // list all category
    public function fetchCategories(Request $request) {
        $categories = Category::all();
        return response()->json($categories);
    }
   
}
