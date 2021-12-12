@extends('layouts.navbar')

@section('content')
<div class="flex pt-8 px-28">
    <span class="text-xl font-semibold text-gray-400">SHOPPING CART > CHECKOUT ></span>
    <span class="ml-2 text-xl font-semibold underline">PAYMENT</span>
    <span class="ml-2 text-xl font-semibold text-gray-400">> ORDER COMPLETE</span>
</div>
<div class="grid grid-cols-2">
    <div class="col-span-1 col-start-1">
        <div class="pt-5 pl-28 pr-10">
            <div class="container w-full h-56">
                <h1 class="font-bold text-4xl">YOUR ORDER</h1>
                @foreach($products as $product)
                <div class="flex flex-col items-center overflow-hidden h-72 pt-10">
                    <img src="{{route('images.displayImage',$product->file)}}" alt="" class="h-60">
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
                        <span class="pl-96">Rp 10.000</span>
                    </li>
                    <li class="font-bold pt-2">
                        <span>Total</span>
                        <span class="ml-8 pl-96">Rp {{$order->price}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-span-1 col-start-2">
        <div class="pt-5 px-14">
            <form action="{{route('updatepayment.post')}}" method="POST">
                @csrf
                <div class="py-3">
                    <h1 class="text-4xl font-bold">PAYMENT METHOD</h1>
                </div>
                <div class="flex pt-5">
                    <input class="hidden" id="radio_bank" type="radio" name="radio" value="Bank">
                    <label id="bankbutt" class="bg-white text-xl font-semibold rounded-md ml-2 px-8 py-3 hover:bg-black hover:text-white cursor-pointer" for="radio_bank">
                        <div id="bankbutt" class="">
                            Bank Transfer
                        </div>
                    </label>
                    <input class="hidden" id="radio_OVO" type="radio" name="payment" value="OVO">
                    <label id="emoneybutt" class="bg-white text-2xl font-semibold rounded-md ml-2 px-14 py-3 hover:bg-black hover:text-white cursor-pointer" for="radio_OVO">
                        <div id="emoneybutt" class="">
                            OVO
                        </div>
                    </label>
                    <input class="hidden" id="radio_GOPAY" type="radio" name="payment" value="GOPAY">
                    <label id="emoneybutt" class="bg-white text-2xl font-semibold rounded-md ml-2 px-12 py-3 hover:bg-black hover:text-white cursor-pointer" for="radio_GOPAY">
                        <div id="emoneybutt2" class="">
                            GOPAY
                        </div>
                    </label>
                    <!-- <button class="bg-black text-white text-xl font-semibold rounded-md px-8 py-3">Transfer Bank</button> -->
                    <!-- <button class="bg-white text-2xl font-semibold rounded-md ml-2 px-14 py-3 hover:bg-black hover:text-white">OVO</button>
                    <button class="bg-white text-2xl font-semibold rounded-md ml-2 px-12 py-3 hover:bg-black hover:text-white">GOPAY</button> -->
                </div>
                <div id="bankdisplay" class="hidden">
                    <ul class="pt-10">
                        <li class="flex items-center pb-4">
                            <input type="radio" class="form-radio" name="payment" value="BCA">
                            <img src="/public/images/bca.jpg" alt="" class="h-10 ml-5">
                            <span class="ml-5 text-xl font-semibold">Bank BCA (Manual Verification)</span>
                        </li>
                        <li class="flex items-center">
                            <input type="radio" class="form-radio" name="payment" value="BRI">
                            <img src="/public/images/bri.jpg" alt="" class="h-20 ml-5">
                            <span class="ml-5 text-xl font-semibold">Bank BRI (Manual Verification)</span>
                        </li>
                        <li class="flex items-center">
                            <input type="radio" class="form-radio" name="payment" value="Mandiri">
                            <img src="/public/images/mandiri.jpg" alt="" class="h-20 ml-5">
                            <span class="ml-5 text-xl font-semibold">Bank Mandiri (Manual Verification)</span>
                        </li>
                        <li class="flex font-medium ml-5 text-lg pt-5">
                            <span>Upon Transfer, Please Confirm Payment via</span>
                            <span class="ml-2 underline cursor-pointer">Whatsapp</span>
                        </li>
                    </ul>
                    <div class="container pr-28 pt-10">
                        <button type="submit" class="w-full bg-black text-white text-xl font-semibold rounded-md py-2">
                            Make Payment
                        </button>
                    </div>
                </div>
                <div id="emoneydisplay" class="hidden">
                    <div class="py-20 ">
                        <h1 class="ml-5 text-xl font-semibold">087728112982 a/n Senikersku</h1>
                        <div class="flex font-medium ml-5 text-lg pt-5">
                            <span>Upon Transfer, Please Confirm Payment via</span>
                            <span class="ml-2 underline cursor-pointer">Whatsapp</span>
                        </div>
                    </div>
                    <div class="container pr-28 pt-10">
                        <button type="submit" class="w-full bg-black text-white text-xl font-semibold rounded-md py-2">
                            Make Payment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
