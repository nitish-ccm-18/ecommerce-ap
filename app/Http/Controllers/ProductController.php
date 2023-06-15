<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        $categories = Category::all();
        return view('vendor.products.create',['categories'=>$categories]);
    }

    // Store a newly created Product
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required ',
            'product_description' => 'required',
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
        Alert('Created Successfully','New product created successfully.');
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
        return view('product', ['product'=>$product,'category'=>$category]);
    }

    // Display the specified product
    public function showSingleProduct($id)
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
        Alert('Updated Successfully','Product updated successfully.');
        return redirect('/products/'.$request->id);
    }


   // change status
   public function changeStatus($id) {
    $status = Product::find($id)->status;
    $status =  (int) $status== 0 ? 1 : 0;
    Product::find($id)->update(
        ['status' => $status ]
    );
    return redirect('/vendors/dashboard');
}

   // change status
   public function markFeaturedProduct($id) {
    $isFeatured = Product::find($id)->featured;
    $isFeatured =  (int) $isFeatured== 0 ? 1 : 0;
    Product::find($id)->update(
        ['featured' => $isFeatured ]
    );
    return redirect('/vendors/dashboard');
}



public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
