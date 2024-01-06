<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $role = Auth()->user()->role;
            if ($role == 'admin') {
                $total_product = Product::count();
                $total_order = Order::count();
                $total_user = User::count();

                $total_revenue = Order::sum('price');

                $total_delivered = Order::where('delivery_status', 'Delivered')->count();
                $total_processing = Order::where('delivery_status', 'processing')->count();

                $total_sales_amount = Order::where('delivery_status', 'Delivered')->sum('price');

                return view('admin.pages.home', compact(
                    'total_product', 'total_order', 'total_user', 'total_revenue',
                    'total_delivered', 'total_processing', 'total_sales_amount'
                ));
            } else if ($role == 'user') {
                $products = Product::all();
                return view('website.pages.home', compact('products'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $products = Product::all();
        return view('website.pages.home', compact('products'));

    }
    public function about()
    {
        return view('website.pages.about');
    }
    public function shop()
    {
        $product = product::paginate(12);

        return view('website.pages.shop',compact('product'));
    }
    public function contact()
    {
        return view('website.pages.contact');
    }
    public function shop_single($id)
    {
        $product = product::find($id);
        return view('website.pages.shop-single',compact('product'));
    }

    public function add_cart(Request $req, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;

            $product = Product::find($id);
            $product_exist = Cart::where('product_id', '=', $id)
                ->where('user_id', '=', $user_id)
                ->first();

            if ($product_exist) {
                $cart = Cart::find($product_exist->id);
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $req->quantity;

                if ($product->discount_price !== null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
                $cart->save();
            } else {
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->product_title = $product->title;
                if ($product->discount_price !== null) {
                    $cart->price = $product->discount_price * $req->quantity;
                } else {
                    $cart->price = $product->price * $req->quantity;
                }

                $cart->image = $product->image;
                $cart->product_id = $product->id;

                $cart->quantity = $req->quantity;
                $cart->save();
            }

            return redirect()->back()->with('message','Successfully Added To The Cart');
        } else {
            return redirect('login');
        }
    }
    

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('website.pages.showcart',compact('cart'));
        }else
        {
            return redirect('login');
        }
        
    }

    public function remove_item($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        // dd($data);
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','!!We have Received Your Order Sir, We Will Get Back To You Soon!!');
    }
    public function stripe($total)
    {
        return view('website.pages.stripe',compact('total'));
    } 

    public function stripePost(Request $request, $total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thank you for Payment"
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = Cart::where('user_id', '=', $userid)->get();

        foreach ($data as $item) {
            $order = new Order;
            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->user_id = $item->user_id;

            $order->product_title = $item->product_title;
            $order->price = $item->price;
            $order->quantity = $item->quantity;
            $order->image = $item->image;
            $order->product_id = $item->product_id;

            $order->payment_status = 'Online Payment';
            $order->delivery_status = 'processing';

            $order->save();

            $item->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }
    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();

            return view('website.pages.order',compact('order'));
        }else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='Order Cancel';

        $order->save();
        return redirect()->back();
    }
    public function shop_product_search(Request $req)
    {
        $search_text=$req->shop_search;
        $product = product::where('title', 'LIKE', "%{$search_text}%")->orWhere('catagory', 'LIKE', "%{$search_text}%")->paginate(10);

        if ($product->isEmpty()) {
            $noProductsMessage = "No products found.";
            return view('website.pages.shop', compact('product', 'noProductsMessage'));
        }

        return view('website.pages.shop', compact('product'));
    }


}
