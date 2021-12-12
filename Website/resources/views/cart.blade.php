@extends('layouts.navbar')

@section('content')
<div class="flex pt-8 px-28">
    <span class="text-xl font-semibold underline">SHOPPING CART</span>
    <span class="ml-2 text-xl font-semibold text-gray-400">> CHECKOUT > PAYMENT > ORDER COMPLETE</span>
</div>
<div class="grid grid-cols-2">
    <div class="col-span-1 col-start-1">

        @foreach($data as $key=>$product)

        <div class="py-5 pl-28 pr-10">
            <div class="flex justify-between px-10 container w-full h-56 border-2 border-black rounded-md">
                <span><img src="{{route('images.displayImage',$product->file)}}" class="h-28 mt-12"></span>
                <ul class="pt-5 ml-5">
                    <li class="grid justify-end pl-56">
                        <form action="{{route('deletecart.post')}}" method="POST"> @csrf <input type="hidden"
                                name="cart_id" value="{{$product->cart_id}}" id=""><button type="submit"><img
                                    src="/images/x_mark.png" alt="" class="w-5 h-5 ml-36"></button></form>
                    </li>
                    <li class="text-xl font-bold">{{$product->name}}</li>
                    <li id="price{{$key}}" class="pt-1 text-lg font-semibold">{{$product->price}}</li>
                    <li class="text-gray-700">
                        <span>Size</span>
                        <span class="ml-10">{{$product->size}}</span>
                    </li>
                    <li class="text-gray-700">
                        <span>Total</span>
                        <span class="ml-9">Rp. </span><span
                            id="total{{$key}}">{{$product->price*$product->amount}}</span>
                    </li>
                    <li class="mt-5">
                        <div class="flex flex-col items-end">
                            <div class="flex">
                                <form action="{{route('minamount.post')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{$product->cart_id}}">

                                    <button type="submit" class="border-2 border-gray-500 px-2.5"
                                        onclick="document.getElementById('amount{{$key}}').innerText--; multiply({{$key}}); total({{$length}})">-</button>
                                </form>

                                <div class="border-2 border-gray-500 px-2.5" id="amount{{$key}}">
                                    {{$product->amount}}
                                </div>
                                <form action="{{route('addamount.post')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{$product->cart_id}}">

                                    <button type="submit" class="border-2 border-gray-500 px-2"
                                        onclick="document.getElementById('amount{{$key}}').innerText++; multiply({{$key}});total({{$length}})">+</button>
                                </form>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        @endforeach

    </div>
    <div class="col-span-1 col-start-2">
        <div class="pt-5 px-20">
            <div class="border-2 border-black rounded-md">
                <div class="px-5 py-3 border-b-2 border-black">
                    <h1 class="text-2xl font-bold">SHOPPING CART TOTAL</h1>
                </div>
                <ul class="py-6 pl-5">
                    <li class="text-xl">
                        <span>Products Total</span>
                        @php
                        $cartid =0;
                        $temp = 0;
                        @endphp
                        <span class="ml-72">Rp </span><span id="productstotal">
                            @foreach($data as $product)
                            @php
                            $temp += $product->price*$product->amount;
                            $cartid = $product->cart_id;
                            @endphp

                            @endforeach{{$temp}}</span>

                    </li>
                    @php
                    $finalprice = $temp + $temp/10 + 10000
                    @endphp
                    <li class="text-xl">
                        <span>Shipping</span>
                        <span class="ml-80 pl-4">Rp 10000</span>
                    </li>
                    <li class="text-xl">
                        <span>Tax</span>
                        <span class="ml-96">Rp </span><span id="tax">{{$temp/10}}</span>
                    </li>
                    <li class="text-xl">
                        <span>Total</span>
                        <span class="ml-80 pl-12">Rp </span><span id="total">{{$finalprice}}</span>
                    </li>
                </ul>
                <div class="mx-12 border-b-2 border-black">
                </div>
                <div class="container px-12 pt-10">
                    <form action="{{route('updateprice.post')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="cart_id" value="{{$cartid}}">
                        <input type="hidden" name="price" value="{{$finalprice}}">
                        <button type="submit" class="bg-black text-white font-bold rounded-md py-2 w-full">
                            CONTINUE TO CHECKOUT
                        </button>
                    </form>
                </div>
                <div class="px-12 pt-5 pb-28 mb-2">
                    <h2 class="text-sm font-light pt-2">Price and Shipping Fee won't be confirmed until checkout.</h2>
                </div>
            </div>
        </div>
    </div>
    @endsection
