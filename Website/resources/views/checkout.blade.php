@extends('layouts.navbar')

@section('content')
<div class="flex pt-8 px-28">
    <span class="text-xl font-semibold text-gray-400">SHOPPING CART ></span>
    <span class="ml-2 text-xl font-semibold underline">CHECKOUT</span>
    <span class="ml-2 text-xl font-semibold text-gray-400">> PAYMENT > ORDER COMPLETE</span>
</div>
<div class="grid grid-cols-2">
    <div class="col-span-1 col-start-1">
        <div class="pt-5 pl-28 pr-10">
            <div class="container w-full h-56">
                <h1 class="font-bold text-4xl">YOUR ORDER</h1>
                @foreach($products as $product)
                <div class="flex flex-col items-center overflow-hidden h-72 pt-10">
                    <img src="{{route('images.displayImage',$product->file)}}" alt="" class="w-2/5">
                </div>
                <div class="flex flex-col items-center">
                    <h1 class="text-2xl font-bold">{{$product->name}}</h1>
                </div>

                @endforeach
                @foreach($data as $cart)
                <div class="pt-10 pb-4 flex border-b-2 mr-10 border-black">
                    <span class="font-semibold text-gray-500">Size : {{$cart->size}}</span>
                    <span class="font-semibold text-gray-500  pl-4 ml-32">Quantity : {{$cart->amount}}</span>
                    <span class="font-bold ml-32">Rp {{$cart->price*$cart->amount}}</span>
                </div>
                @endforeach
                <ul>
                    <li class="font-bold pt-2">
                        <span>Subtotal</span>
                        <span class="pl-96 ml-1">Rp {{$order->price-10000}}</span>
                    </li>
                    <li class="font-bold pt-2">
                        <span>Shipping</span>
                        <span class="pl-96">Rp 10000</span>
                    </li>
                    <li class="font-bold pt-2 pb-10">
                        <span>Total</span>
                        <span class="ml-7 pl-96">Rp {{$order->price}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-span-1 col-start-2">
        <div class="pt-5 px-20">
            <form action="{{route('fillform.post')}}" method="POST">
                @csrf
                <div class="py-3">
                    <h1 class="text-4xl font-bold">BILLING DETAILS</h1>
                </div>
                <ul class="pt-6 text-lg">
                    <li class="pt-6 text-gray-500">
                        <span class="mr-28 font-bold">Name</span>
                        <span class="ml-2">:</span>
                        <span class="ml-5"><input class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700"
                                id="name" name="name" type="text" placeholder=""></span>
                    </li>
                    <li class="pt-6 text-gray-500">
                        <span class="mr-28 font-bold">Email</span>
                        <span class="ml-3">:</span>
                        <span class="ml-5"><input class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700"
                                id="email" name="email" type="email" placeholder=""></span>
                    </li>
                    <li class="pt-6 text-gray-500">
                        <span class="mr-11 font-bold">Phone Number</span>
                        <span class="">:</span>
                        <span class="ml-5"><input class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700"
                                id="no_telp" name="phone" type="text" placeholder=""></span>
                    </li>
                    <li class="pt-6 text-gray-500">
                        <span class="mr-20 font-bold">Address</span>
                        <span class="pl-2 ml-3">:</span>
                        <span class="ml-5"><input class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700"
                                id="alamat" name="address" type="text" placeholder=""></span>
                    </li>
                    <li class="pt-6 text-gray-500">
                        <span class="mr-16 font-bold">Postal Code</span>
                        <span class="ml-1">:</span>
                        <span class="ml-5"><input class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700"
                                id="kode_pos" name="postalcode" type="text" placeholder=""></span>
                    </li>
                    <div class="flex items-center py-6">
                        <button type="button" onclick="changecheckbox()">

                            <label for="toogle" class="flex items-center cursor-pointer">
                                <!-- toggle -->
                                <div class="relative">
                                    <!-- input -->
                                    <input name="mydata" value="0" id="toogle" type="checkbox" class="sr-only" />
                                    <!-- line -->
                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                    <!-- dot -->
                                    <div
                                        class="dot absolute w-6 h-6 bg-gray-400 rounded-full shadow -left-1 -top-1 transition">
                                    </div>
                                </div>

                                <!-- label -->
                                <div class="ml-3 text-black font-medium">
                                    Use Data from My Account
                                </div>
                            </label>
                        </button>

                    </div>
                    <div class="flex flex-col container pt-3 pr-32">
                        <button class="bg-black rounded-md px-6 py-2 text-white w-full" type="submit">
                            <a class="text-xl font-semibold">Place Order</a>
                        </button>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</div>
@endsection
