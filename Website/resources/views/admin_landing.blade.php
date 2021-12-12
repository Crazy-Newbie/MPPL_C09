<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Senikersku</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="grid grid-cols-12">
            <div class="col-span-3 h-screen bg-black">
                <ul class="pt-10 flex flex-col items-center">
                    <li>
                        <img src="/images/senikersku.webp" alt="" class="w-40">
                    </li>
                    <li class="mt-2">
                        <h2 class="text-white font-semibold text-lg">
                            Welcome, Admin
                        </h2>
                    </li>
                    <li class="mt-20 px-10 w-full h-12">
                        <button class="bg-white rounded-md px-2 py-2 w-full h-12">
                            <a href="{{route('admin')}}" class="flex items-center">
                                <img src="/images/home-black.png" alt="" class="w-8 pl-1">
                                <span class="pl-4">Home</span>
                            </a>
                        </button>
                    </li>
                    <li class="mt-6 px-10 w-full h-12">
                        <button
                            class="shoes bg-black border-2 border-white rounded-md px-2 py-2 w-full h-12 text-white hover:bg-white hover:border-black hover:text-black">
                            <a href="{{route('additem')}}" class="flex items-center">
                                <img src="/images/shoes-white.png" alt="" id="hoveritem1" class="relative w-8 pl-1">
                                <img src="/images/shoes-black.png" alt="" id="hoveritem2"
                                    class="absolute w-8 pl-1 hidden">
                                <span class="pl-4" id="hovertext">Add Item</span>
                            </a>
                        </button>
                    </li>
                    <!-- <li class="mt-6 px-10 w-full h-12">
                        <button
                            class="shoes bg-black border-2 border-white rounded-md px-2 py-2 w-full h-12 text-white hover:bg-white hover:border-black hover:text-black">
                            <a href="/public/admin_overview.html" class="flex items-center">
                                <img src="/images/overview-white.png" alt="" id="hoveritem1" class="relative w-8 pl-1">
                                <img src="/images/overview-black.png" alt="" id="hoveritem2"
                                    class="absolute w-8 pl-1 hidden">
                                <span class="pl-4" id="hovertext">Overview</span>
                            </a>
                        </button>
                    </li> -->
                    <li class="mt-6 px-10 w-full h-12">
                        <button
                            class="shoes bg-black border-2 border-white rounded-md px-2 py-2 w-full h-12 text-white hover:bg-white hover:border-black hover:text-black">
                            <a href="{{route('updatestatus')}}" class="flex items-center">
                                <img src="/images/order-white.png" alt="" id="hoveritem1" class="relative w-8 pl-1">
                                <img src="/images/order-black.png" alt="" id="hoveritem2"
                                    class="absolute w-8 pl-1 hidden">
                                <span class="pl-4" id="hovertext">Change Order Status</span>
                            </a>
                        </button>
                    </li>
                    <li class="mt-44 px-10 w-full h-10">
                        <button
                            class="bg-red-700 rounded-md px-2 py-2 w-full h-10 text-white hover:bg-red-800 hover:text-gray-200">
                            <a href="{{route('signin')}}" class="flex flex-col items-center">
                                <span class="font-bold text-md">Sign Out</span>
                            </a>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="col-span-2 col-start-4">
                <h1 class="pl-7 mt-10 text-3xl font-bold">
                    Pending Order
                </h1>
                <div class="flex flex-col pt-14 pl-10">
                    <label class="flex items-center mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold">ID</span>
                    </label>
                    @foreach($orders as $order)
                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">{{$order->id}}</span>
                    </label>
                    @endforeach
                    {{-- <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">45002</span>
                    </label>
                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">45003</span>
                    </label>
                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">45004</span>
                    </label>
                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">45005</span>
                    </label>
                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">45006</span>
                    </label>
                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">45007</span>
                    </label> --}}
                </div>
            </div>
            <div class="col-span-2 col-start-6 w-full">
                <h1 class="mt-10 text-3xl font-bold text-white">
                    .
                </h1>
                <div class="flex flex-col pt-14">
                    <label class="flex flex-col items-center mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold">Order Date</span>
                    </label>
                    @foreach($orders as $order)
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">{{$order->updated_at}}</span>
                    </label>
                    @endforeach
                    {{-- <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">27/06/2021</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">23/06/2021</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">23/06/2021</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">12/06/2021</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">01/01/2021</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">19/06/2021</span>
                    </label> --}}
                </div>
            </div>
            <div class="col-span-2 col-start-8 w-full">
                <h1 class="mt-10 text-3xl font-bold text-white">
                    .
                </h1>
                <div class="flex flex-col pt-14">
                    <label class="flex flex-col items-center mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold">Customer</span>
                    </label>
                    @foreach($orders as $order)
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">{{$order->name}}</span>
                    </label>
                    @endforeach
                    {{-- <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">Eji</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">Gerald</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">Ben</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">Mel</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">Drigo</span>
                    </label>
                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">Ivan</span>
                    </label> --}}
                </div>
            </div>
            <div class="col-span-3 col-start-10 w-full">
                <h1 class="mt-10 text-3xl font-bold text-white">
                    .
                </h1>
                <div class="flex flex-col pt-14 pr-10">
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-2.5">
                            <span class="ml-6 text-xl font-bold pr-12">Cost</span>
                            <span><img src="/public/images/more.png" alt="" class="w-6 h-1.5"></span>
                        </label>
                    </div>
                    @foreach($orders as $order)
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp {{$order->price}}</span>
                        </label>
                    </div>
                    @endforeach
                    {{-- <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp 100.000.000</span>
                        </label>
                    </div>
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp 12.000.000</span>
                        </label>
                    </div>
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp 1.000.000.000</span>
                        </label>
                    </div>
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp 40.000.000</span>
                        </label>
                    </div>
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp 5.000.000</span>
                        </label>
                    </div>
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-16">Rp 10.000.000</span>
                        </label>
                    </div> --}}
                    <div class="flex flex-col items-end">
                        {{-- <span class="mt-5 text-2xl font-semibold">
                            < 1 of 50 >
                        </span> --}}
                        {{ $orders->links('landingpaginator') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
