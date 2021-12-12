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
class OrderdetailController extends Controller
{
    public function formpage(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $data = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->select('carts.*', 'products.price')
            ->where('carts.user_id', '=', Auth::user()->id)
            ->get();
        $productids = Cart::where('user_id', Auth::user()->id)->get('product_id');
        $products = Product::whereIn('id', $productids)->get();
        $order = Orderdetail::where('user_id', Auth::user()->id)->get()->first();
        // dd($data);
        return view('checkout', compact('data','products','order'));
    }

    public function fillform(Request $request){
        $user = User::where('id',Auth::user()->id)->get()->first();
        // dd($user->name);

        if($request->get('mydata')==0){
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'postalcode' => 'required',
            ]);
            Orderdetail::where('user_id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'postalcode' => $request->postalcode,
            ]);
        }
        else{
            Orderdetail::where('user_id', Auth::user()->id)->update([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'postalcode' => $user->postalcode,
            ]);
        }
        return redirect()->route('payment');
    }

    public function paymentpage(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $data = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->select('carts.*', 'products.price')
            ->where('carts.user_id', '=', Auth::user()->id)
            ->get();
        $productids = Cart::where('user_id', Auth::user()->id)->get('product_id');
        $products = Product::whereIn('id', $productids)->get();
        $order = Orderdetail::where('user_id', Auth::user()->id)->get()->first();
        // dd($data);
        return view('payment', compact('data','products','order'));
    }

    public function trackingpage(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $data = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->join('orderdetails', 'carts.id', '=', 'orderdetails.cart_id')
            ->select('orderdetails.*', 'products.name', 'products.file')
            ->where('carts.user_id', '=', Auth::user()->id)
            ->where('orderstatus', 'ONGOING')
            ->get();
        $productids = Cart::where('user_id', Auth::user()->id)->get('product_id');
        $products = Product::whereIn('id', $productids)->get();
        $orders = Orderdetail::where('user_id', Auth::user()->id)->where('orderstatus', '')->get();
        // dd($data);
        return view('lacak', compact('data'));
    }

    public function historypage(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $ongoings = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->join('orderdetails', 'carts.id', '=', 'orderdetails.cart_id')
            ->select('orderdetails.*', 'products.name', 'products.file')
            ->where('carts.user_id', '=', Auth::user()->id)
            ->where('orderstatus', 'ONGOING')
            ->get();
        $completeds = DB::table('products')
        ->join('carts', 'products.id', '=', 'carts.product_id')
        ->join('orderdetails', 'carts.id', '=', 'orderdetails.cart_id')
        ->select('orderdetails.*', 'products.name', 'products.file')
        ->where('carts.user_id', '=', Auth::user()->id)
        ->where('orderstatus', 'Completed')
        ->get();
        $cancelleds = DB::table('products')
        ->join('carts', 'products.id', '=', 'carts.product_id')
        ->join('orderdetails', 'carts.id', '=', 'orderdetails.cart_id')
        ->select('orderdetails.*', 'products.name', 'products.file')
        ->where('carts.user_id', '=', Auth::user()->id)
        ->where('orderstatus', 'Cancelled')
        ->get();
        $productids = Cart::where('user_id', Auth::user()->id)->get('product_id');
        $products = Product::whereIn('id', $productids)->get();
        $orders = Orderdetail::where('user_id', Auth::user()->id)->where('orderstatus', '')->get();
        // dd($completeds);
        return view('riwayat_pembelian', compact('ongoings','completeds','cancelleds'));

    }
    
    public function updatepayment(Request $request)
    {
        // dd($request);

        $request->validate([
            'payment' => 'required',
        ]);


        Orderdetail::where('user_id', Auth::user()->id)->update([
            'payment' => $request->payment,
        ]);

        return redirect()->route('ordercomplete');

    }

    public function updatestatuspage()
    {   
        $orders = \App\Models\Orderdetail::paginate(1);
        // dd($orders);
        // $orders = Orderdetail::all()->paginate(1);
        return view('admin_change', compact('orders'));
    }

    public function updatestatus(Request $request){
        $request->validate([
            'orderstatus' => 'required',
            'id' => 'required',
        ]);
        // dd($request->file);
        if ($request->hasFile('file')) {
            // dd($request->file);

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('public/images/');
            // dd( $request->file->hashName());
            // Store the record, using the new file hashname which will be it's new filename identity.
            Orderdetail::where('id', $request->id)->update([
                'orderstatus' => $request->orderstatus,
                'file' => $request->file->hashName(),

            ]);

        }
        else{
            Orderdetail::where('id', $request->id)->update([
                'orderstatus' => $request->orderstatus,
            ]);
        }
        return redirect()->route('updatestatus');
    }

    public function adminpage(){
        $orders = Orderdetail::where('orderstatus', 'ONGOING')->paginate(10);
        // dd($orders);

        return view('admin_landing', compact('orders'));
    }

    public function ordercomplete(){
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $data = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->select('carts.*', 'products.price','products.name as p_name')
            ->where('carts.user_id', '=', Auth::user()->id)
            ->get();
        $productids = Cart::where('user_id', Auth::user()->id)->get('product_id');
        $products = Product::whereIn('id', $productids)->get();
        $order = Orderdetail::where('user_id', Auth::user()->id)->get()->first();
        // dd($data);
        return view('order_complete', compact('data','products','order'));
    }
}
