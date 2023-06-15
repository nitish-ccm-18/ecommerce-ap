<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    // single order viewer
    public function singleOrderViewer($id) {
        $order =  DB::select('SELECT 
        products.name as product_name,
        products.description as product_description,
        categories.name as category_name,
        users.name as user_name,
        total_price,
        sale_price,
        price,
        products.image as product_picture,
        CONCAT(line1,", ",line2,", ",state,", ",pincode) as address FROM `orderdetails`
        join orders on orderdetails.order_id = orders.id 
        join products on orderdetails.product_id = products.id 
        join addresses on orders.address_id = addresses.id
        join categories on products.category_id = categories.id
        join users on orders.user_id = users.id where orders.id = ?',[$id]);

        return view('order',['order'=>$order]);
    }
}
