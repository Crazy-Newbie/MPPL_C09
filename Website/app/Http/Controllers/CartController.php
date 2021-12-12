<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Productdetail;
use App\Models\Orderdetail;
use App\Models\User;
use App\Models\Cart;
use DB;


class CartController extends Controller
{
    public function cartpage(){
        // dd(Auth);
        $id = Auth::user()->id;
        // $carts = Cart::where('user_id', $id)->get();
        // $products = Product::join('carts', 'carts.product_id', '=', 'products.id')->select(DB::raw())
        // if(Auth::user()){
            $data = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->select('products.*', 'carts.size', 'carts.amount', 'carts.id as cart_id')
            ->where('carts.user_id', '=', $id)
            ->get();
        // }
        // dd($data);
        $length = count($data);
        
        // dd($length);
        return view('cart', compact('data','length'));
    }
    public function addcart(Request $request)
    {
        // dd($request);
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'size' => 'required',
            'amount' => 'required',

        ]);
        
        $currentcarts = Cart::where('size', $request->get('size'))->where('product_id', $request->get('product_id'))->where('user_id', $request->get('user_id'))->first();
        // dd($currentcarts);
        if(!$currentcarts)
        {
            $cart = new Cart([
                "user_id" => $request->get('user_id'),
                "product_id" => $request->get('product_id'),
                "size" => $request->get('size'),    
                "amount" => $request->get('amount'),    
            ]);
            $cart->save(); // Finally, save the record.
        }
        else {
            $currentamount = Cart::where('size', $request->get('size'))->where('product_id', $request->get('product_id'))->where('user_id', $request->get('user_id'))->value('amount');
            $add = $request->get('amount');
            $newamount = $add + $currentamount;
            // Cart::where('size', $request->get('size'))->update('amount' => $newamount);
            Cart::where('size',$request->get('size'))->where('product_id', $request->get('product_id'))->update([
                'amount' => $add + $currentamount,

            ]);
        }
        
        
        
        return redirect()->route('cartpage');
    }
    public function updateprice(Request $request)
        {

            $request->validate([
                'price' => 'required',
                'user_id' => 'required',
                // 'cart_id' => 'required',
            ]);
            $currentorder = Orderdetail::where('user_id', $request->get('user_id'))->first();
            if(!$currentorder){
                $orderdetails = new Orderdetail([
                    "user_id" => $request->get('user_id'),
                    "cart_id" => $request->get('cart_id'),
                    "price" => $request->get('price'),    
                ]);
                $orderdetails->save(); // Finally, save the record.
            }
            else{
                Orderdetail::where('user_id', $request->get('user_id'))->update([
                    "price" => $request->get('price'), 
                ]);
            }
            // dd($request);


            return redirect()->route('checkout');
        }

    public function addamount(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
        ]);

        Cart::where('id', $request->get('cart_id'))->update([
            'amount' => DB::raw('amount+1')
        ]);

        return redirect()->route('cartpage');
    }

    public function minamount(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
        ]);

        Cart::where('id', $request->get('cart_id'))->update([
            'amount' => DB::raw('amount-1')
        ]);

        return redirect()->route('cartpage');
    }

    public function deletecart(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
        ]);

        $flight = Cart::find($request->get('cart_id'));

        $flight->delete();

        return redirect()->route('cartpage');
    }
}
