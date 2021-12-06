<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->delivery_address = $request->input('delivery_address');
        $order->town = $request->input('town');
        $order->city = $request->input('city');
        $order->county = $request->input('county');
        $order->pincode = $request->input('pincode');

        $order->payment_mode = 'Mpesa';
        $order->payment_id = 'FGNHUR75v8';     

        // $order->payment_mode = $request->input('payment_mode');
        // $order->payment_id = $request->input('payment_id');        

        //To calculate the total price
        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems_total as $prod)
        {
            $total += $prod->products->selling_price;
            
        }

        $order->total_price = $total;

        $order->tracking_no = 'jakim'.rand(1111,9999);
        $order->save();


        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod-> qty = $prod-> qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address == null)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->delivery_address = $request->input('delivery_address');
            $user->town = $request->input('town');
            $user->city = $request->input('city');
            $user->county = $request->input('county');
            $user->pincode = $request->input('pincode');
            $user->update();   
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        // if($request->input('payment_mode') == "Paid by Mpesa")
        // {
        //     return response()->json(['status'=> "Order placed Successfully"]);
        // }
        return redirect('/')->with('status', "Order placed successfully");
    }

    public function mpesaCheck(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;

        foreach($cartItems as $item)
        {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $deliveryAddress = $request->input('deliveryAddress');
        $town = $request->input('town');
        $city = $request->input('city');
        $county = $request->input('county');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstname'=> $firstname,
            'lastname'=> $lastname,
            'email'=> $email,
            'phone'=> $phone,
            'address'=> $address,
            'deliveryAddress'=> $deliveryAddress,
            'town'=> $town,
            'city'=> $city,
            'county'=> $county,
            'pincode'=> $pincode,
            'total_price'=> $total_price
        ]);
    
    }
}
