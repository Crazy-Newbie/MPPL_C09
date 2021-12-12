@extends('layouts.navbar')

@section('content')
<div class="flex pt-8 px-28">
    <span class="text-xl font-semibold text-gray-400">SHOPPING CART > CHECKOUT ></span>
    <span class="ml-2 text-xl font-semibold text-gray-400">PAYMENT ></span>
    <span class="ml-2 text-xl font-semibold underline">ORDER COMPLETE</span>
</div>
<div class="px-28 pt-10">
    <h1 class="text-4xl font-bold pb-5">
        ORDER COMPLETE
    </h1>
    <div class="pt-10 flex flex-col items-start w-98 h-60 m-auto">
        <div class="border-b-4 border-gray-800 w-98">
            <h2 class="text-3xl font-semibold py-2">
                Pricing Details
            </h2>
        </div>
        <div class="py-3 flex justify-between w-98">
            <div class="text-xl font-semibold">
                Payment Method
            </div>
            <div class="text-xl font-semibold">
                {{$order->payment}}
            </div>
        </div>
        @php
        $subtot = 0;
        @endphp
        @foreach($data as $product)
        <div class="py-3 flex justify-between w-98">
            @php
            $subtot+=$product->price*$product->amount;
            @endphp
            <div class="text-xl font-semibold">
                {{$product->p_name}} x {{$product->amount}}
            </div>
            <div class="text-xl font-semibold">
                Rp {{$product->price*$product->amount}}
            </div>
        </div>
        @endforeach


        <div class="py-3 flex justify-between w-98">
            <div class="text-xl font-semibold">
                Subtotal
            </div>
            <div class="text-xl font-semibold">
                Rp {{$subtot}}
            </div>
        </div>
        <div class="py-3 flex justify-between w-98">
            <div class="text-xl font-semibold">
                Shipping
            </div>
            <div class="text-xl font-semibold">
                Rp 10000
            </div>
        </div>
        <div class="py-3 flex justify-between w-98">
            <div class="text-xl font-semibold">
                Total
            </div>
            <div class="text-xl font-semibold">
                Rp {{$order->price}}
            </div>
        </div>
    </div>
    <div class="pt-64 flex flex-col items-center">
        <a href="{{route('landing')}}">
            <button class="px-16 py-2 bg-gray-900 text-gray-200 font-semibold text-xl rounded-md">
                Home
            </button>
        </a>
    </div>
</div>
@endsection
