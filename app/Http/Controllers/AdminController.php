<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);  // Add middleware to require authentication for all functions
    }

    public function view_catagory()
    {
        $data = catagory::all();
        return view('admin.pages.view_catagory', compact('data'));
    }

    public function add_catagory(Request $req)
    {
        $data = new catagory;
        $data->catagory_name = $req->catagory;
        $data->save();
        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }

    public function view_product()
    {
        $catagory = catagory::all();
        return view('admin.pages.product', compact('catagory'));
    }

    public function add_product(Request $req)
    {
        $product = new Product;
        $product->title = $req->title;
        $product->description = $req->description;
        
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imageName);
            $product->image = $imageName;
        }
        
        $product->catagory = $req->catagory;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->discount_price = $req->discount_price;
        
        $product->save();
        return redirect()->back()->with('message', 'Added Successfully.');
    }

    public function show_product()
    {
        $product= product::all();
        return view('admin.pages.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product = product::find($id); 
        $product->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = product::find($id); 
        $catagory =catagory::all();
        return view('admin.pages.update_product',compact('product','catagory'));
    }

    public function update_product_confirm(Request $req, $id)
    {
        $product=product::find($id);
        $product->title=$req->title;
        $product->description=$req->description;
        
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imageName);
            $product->image = $imageName;
        }

        $product->catagory=$req->catagory;
        $product->quantity=$req->quantity;
        $product->price=$req->price;
        $product->discount_price=$req->discount_price;
        
        $product->save();
        return redirect()->back()->with('message', 'Updated successfully.');
    }

    public function order()
    {
        $order=order::all();
        return view('admin.pages.order',compact('order'));
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="Delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back();
    }

    public function orderproduct(Request $req)
    {
        $search=$req->search;

        $order=order::where('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")
        ->orWhere('product_title','LIKE',"%$search%")->get();

        return view('admin.pages.order',compact('order'));
    }

    public function admin_product_search(Request $req)
    {
        $search=$req->admin_productsearch;

        $product=product::where('title','LIKE',"%$search%")->orWhere('catagory','LIKE',"%$search%")->get();

        return view('admin.pages.show_product',compact('product'));
    }
}
