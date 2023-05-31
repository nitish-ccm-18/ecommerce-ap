<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // list all products
    public function index() 
    {
        $products = Product::all();
        return view('vendor.products.index',["products"=>$products]);
    }

    // Display form for creating product
    public function create()
    {
        return view('vendor.products.create');
    }

    // Store a newly created Product
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required | max:10',
            'product_description' => 'required | max:50',
            'product_price' => 'required',
            'product_sale_price' => 'required',
            'product_quantity' => 'required',
            'product_weight' => 'required',
            'product_image' => 'required'
        ]);
        
        $image = $request->file('product_image');
        $image_filename = time() . $image->getClientOriginalName();
        $image->move(public_path('public/Image/Products'),$image_filename);

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->product_name,
            'description' => $request->product_description,
            'quantity' => $request->product_quantity,
            'weight' => $request->product_weight,
            'price' => $request->product_price,
            'sale_price' => $request->product_sale_price,
            'status' => TRUE,
            'featured' => False,
            'image' => $image_filename
        ]);
        return redirect('/products');
    }

    // Display the specified product
    public function show($id)
    {
        $product = Product::find($id);
        
        // if product not found
        if($product == null) 
        {
            return back();
        }

        $category = $product->category;
        return view('vendor.products.show', ['product'=>$product,'category'=>$category]);
    }

    // Display form for update category
    public function editPage($id) 
    {
        $product = Product::find($id);
        // if product not found
        if($product == null) 
        {
            return back();
        }
        $category = $product->category;
        return view('vendor.products.edit', ['product'=>$product,'category'=>$category]);
    }


    // Update specified
    public function edit(Request $request) 
    {
        // validate data
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required ',
            'product_description' => 'required ',
            'product_price' => 'required',
            'product_sale_price' => 'required',
            'product_quantity' => 'required',
            'product_weight' => 'required',
        ]);

        if($request->file('product_image')){
            // remove existing file
            $image = Product::find($request->id)->image;

            if(file_exists(public_path().'/public/Image/Products/'.$image) && $image){
                unlink(public_path().'/public/Image/Products/'.$image);
            }
            
            $file= $request->file('product_image');
            $filename= time().$file->getClientOriginalName();
            $file-> move(public_path('public/Image/Products'), $filename);

            Product::where('id',$request->id)->update([
                'category_id' => $request->category_id,
                'description' => $request->product_description,
                'price' => $request->product_price,
                'sale_price' => $request->product_sale_price,
                'quantity' => $request->product_quantity,
                'weight' => $request->product_weight,
                'image' => $filename
            ]);
        }else {
            Product::where('id',$request->id)->update([
                'category_id' => $request->category_id,
                'description' => $request->product_description,
                'price' => $request->product_price,
                'sale_price' => $request->product_sale_price,
                'quantity' => $request->product_quantity,
                'weight' => $request->product_weight
            ]);
        }
        
        return redirect('/products/'.$request->id);
    }

}
