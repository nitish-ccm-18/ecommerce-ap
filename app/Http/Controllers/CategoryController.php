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
        return view('categories.index', ['categories'=>$categories]);
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
            'name' => 'required | max:10',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);

        $image = $request->file('thumbnail');
        $image_filename = time() . $image->getClientOriginalName();
        $image->move(public_path('public/Image/Categories'),$image_filename);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $image_filename,
            'status' => TRUE
        ]);
        Alert('Created Successfully','New category created successfully.');
        return redirect('/vendor/categories');
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
            'name' => 'required | max:10',
            'description' => 'required',
            
        ]);
        if($request->file('thumbnail')) {
            // remove existing file
            $image = Category::find($request->id)->thumbnail;
            if(file_exists(public_path().'/public/Image/Categories/'.$image) && $image){
                unlink(public_path().'/public/Image/Categories/'.$image);
            }

            $file= $request->file('thumbnail');
            $filename= time().'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/Image/Categories'), $filename);
        }

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->thumbnail = $filename;
        $category->save();

        Alert('Updated Successfully','Category updated successfully.');
        return redirect('/vendor/categories');
    }


    // list all category
    public function fetchCategories(Request $request) {
        $categories = Category::all();
        return response()->json($categories);
    }

    // change status
    public function changeStatus($id) {
        $category = Category::find($id)->status;
        $status =  (int) $category== 0 ? 1 : 0;
        Category::find($id)->update(
            ['status' => $status ]
        );
        Alert('Status Changed','Category status created successfully.');
        return redirect('/vendor/categories');
    }
}
