<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Productdetail;
use App\Models\Wishlist;
use DB;

class ProductController extends Controller
{
    public function addpage()
    {
        $products = \App\Models\Product::paginate(8);
        return view('admin_add', compact('products'));
    }
    public function editpage($id)
    {  
        
        $product = Product::where('id',$id)->first();
        // dd($product);
        return view('admin_edit', compact('product'));
    }
    public function caripage()
    {
        $products = Product::all();
        return view('cari_barang', compact('products'));
    }
    public function detailpage($id)
    {
        // if(Auth::attempt()){
            // $user = Auth::user();
            $product = Product::where('id',$id)->first();
            $details = Productdetail::where('product_id', $id)->get();
            // $details = Productdetail::all();
            // dd($details);
            return view('detail_barang', compact('details', 'product'));
        // }

    }
    public function edititem(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);
        // dd($request);
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('public/images/');

            // Store the record, using the new file hashname which will be it's new filename identity.
            Product::where('id', $request->id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
                'file' => $request->file->hashName(),

            ]);

        }
        else{
            Product::where('id', $request->id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'category' => $request->category,
            ]);
        }

        return redirect('additem');
        
    }

    public function landingpage()
    {
        $products = Product::all()->toArray();
        $jordans = Product::where('category', 'Jordan')->get();
        $jordancount  = count($jordans);
        if($jordancount >0){
            $jordans2 = Product::where('category', 'Jordan')->get();

            while($jordancount<10){
                    foreach($jordans as $product){
                        $jordans2->add($product);
                    }
                $jordancount  = count($jordans2);
    
                }
        }
        $yeezys = Product::where('category', 'Yeezy')->get();
        
        $yeezycount  = count($yeezys);
        // dd($yeezycount);
        if($yeezycount >0){
            $yeezys2 = Product::where('category', 'Yeezy')->get();
            while($yeezycount<10){
                    foreach($yeezys as $product){
                        $yeezys2->add($product);
                    }
                $yeezycount  = count($yeezys2);
    
                }
        }
        $nikes = Product::where('category', 'Nike')->get();
        
        $nikecount  = count($nikes);
        // dd($yeezycount);
        if($nikecount >0){
            $nikes2 = Product::where('category', 'Nike')->get();
            while($nikecount<10){
                    foreach($nikes as $product){
                        $nikes2->add($product);
                    }
                $nikecount  = count($nikes2);
    
                }
        }


            // dd($jordans2);
        // dd($nikes2, $yeezys2);
        return view('landing', compact('jordans2', 'nikes2', 'yeezys2'));
    }

    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            // 'size' => 'required',
            // 'stock' => 'required',

        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('public/images/');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $product = new Product([
                "name" => $request->get('name'),
                "file" => $request->file->hashName(),
                "price" => $request->get('price'),
                "category" => $request->get('category'),
                // "size" => $request->get('size'),
                // "stock" => $request->get('stock'),


            ]);
            $product->save(); // Finally, save the record.
        }

        return redirect('additem');

    }

    public function formdetail(Request $request){
        $request->validate([
            'id' => 'required',
            'size' => 'required',
            'stock' => 'required',

        ]);

        $productdetail = new Productdetail([
            "product_id" => $request->get('id'),
            "size" => $request->get('size'),
            "stock" => $request->get('stock'),

        ]);
        $productdetail->save(); // Finally, save the record.
        return redirect()->route('additem'); 
    }

    public function listproducts(Request $request)
    {
        // dd($request->term);
        if($request->term){
            $products = Product::where(function ($query) use ($request) {
                $query->where('category', 'LIKE', '%' . $request->term . '%' )->orWhere('name', 'LIKE', '%' . $request->term . '%' );
                })->paginate(4);
        }
        else{
            $products = Product::where(function ($query) use ($request) {
                $query->where('category', 'LIKE', '%' . $request->term . '%' )->orWhere('name', 'LIKE', '%' . $request->term . '%' );
                })->paginate(4);
        }
        return view('cari_barang',compact('products'));
    }

    public function editdetail($id)
    {  
        
        $product = Product::where('id',$id)->first();
        // dd($product);
        return view('admin_detail', compact('product'));
    }
  

    public function addwishlist(Request $request){
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
        ]);

        if(!Wishlist::where('product_id',$request->get('product_id'))->first()){
            $wishlist = new Wishlist([
                "product_id" => $request->get('product_id'),
                "user_id" => $request->get('user_id'),
            ]);
            $wishlist->save();
        }

        return redirect()->route('wishlist'); 
    }

    public function wishlistpage(){
        $wishlistitems=Wishlist::where('user_id',Auth::user()->id)->get();
        // dd($wishlistitems);
        $countwishlist = count($wishlistitems);
        $productids = Wishlist::where('user_id', Auth::user()->id)->get('product_id');
        $products = Product::whereIn('id', $productids)->get();

        return view('wishlist', compact('wishlistitems','countwishlist','products'));
    }

    public function destroywishlist(Request $request){
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
        ]);

        DB::table('wishlists')->where('user_id', $request->get('user_id'))->where('product_id', $request->get('product_id'))->delete();

        return redirect()->route('wishlist');
    }

    public function destroyproduct(Request $request){
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
        ]);

        DB::table('wishlists')->where('user_id', $request->get('user_id'))->where('product_id', $request->get('product_id'))->delete();

        return redirect()->route('additem');
    }
}
