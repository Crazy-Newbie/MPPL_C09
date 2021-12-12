@extends('layouts.navbar')

@section('content')
<div>
    @php
    $maxjordan = 0;
    @endphp
    @php
    $jordan = [];
    $nike = [];
    $yeezy = [];
    $index1 = 0;
    $index2 = 0;
    $index3 = 0;
    @endphp
    {{-- @php --}}
    {{-- @foreach($products as $product)
    @php
        if($product->category == 'Jordan')
            array_push($jordan,$product);
    @endphp

    @endforeach --}}
    {{-- @php
        dd($jordan);
    @endphp --}}
    {{-- @endphp --}}
    {{-- @foreach($products as $product)
    @if($product->category=='Jordan')
    @php
    $index1++;
    if($index1 = 1){
    $jordan[$index1-1]=3;}
    else if($index1>5) $jordan[$index1-1]=4;

    @endphp
    @endif
    @if($product->category=='Yeezy')
    @php
    $index2++;
    if($index2 = 1){
    $yezzy[$index2]=5;}
    else $yeezy[$index2]=6;
    @endphp
    @endif
    @if($product->category=='Nike')
    @php
    $index3++;
    if($index3 = 1){
    $nike[$index3]=1;}
    else $nike[$index3]=2;
    @endphp
    @endif
    @endforeach --}}
    <img src="/images/landing_page.png" alt="">
    <div class="sliderAx w-full h-96 px-48 py-10">
        <div class="flex justify-between px-5">
            <div>
                <h1 class="text-2xl font-bold">AIR JORDAN</h1>
            </div>
            <div>
                <form action="{{route('caribarang')}}" method="GET" role="search">
                    @csrf
                    <button value="Jordan" name="term" type="submit" class="underline">view all</button>
                </form>
            </div>
        </div>
        <div id="slider-3" class="container mx-auto">
            <div class="py-16 grid grid-cols-1 xl:grid-cols-5 gap-5">
                @foreach($jordans2 as $key=> $product)
                @if($key<5) <div class="overflow-hidden">

                    <div class="overflow-hidden h-40 flex">
                        <a class="mx-auto my-auto w-40 object-cover float-left"
                            href="{{route('detailbarang', $product->id)}}">
                            <img src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
                        </a>
                    </div>
                    <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
                        <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
                        <p class="text-gray-700">
                            Rp {{$product->price}}
                        </p>
                    </div>
            </div>

            @endif
            @endforeach

            {{-- @if($index1 < 5)
                @for($i=0; $i<)
            @endif --}}
            {{-- @php
                $index = 0;
                @foreach
                
                @endforeach
            @endphp --}}

        </div>
    </div>
    <div id="slider-4" class="container mx-auto">
        <div class="py-16 grid grid-cols-1 xl:grid-cols-5 gap-5">
            @foreach($jordans2 as $key=> $product)
            @if($key>=5 && $key<10) <div class="overflow-hidden">

                <div class="overflow-hidden h-40 flex">
                    <a class="mx-auto my-auto w-40 object-cover float-left"
                        href="{{route('detailbarang', $product->id)}}">
                        <img src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
                    </a>
                </div>
                <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
                    <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
                    <p class="text-gray-700">
                        Rp {{$product->price}}
                    </p>
                </div>
        </div>

        @endif
        @endforeach
        {{-- @foreach($products as $key => $product)

            @if($key>5 && $product->category == 'Jordan')
            @php
            $maxjordan++;
            @endphp
            <div class="overflow-hidden">
            <div class="overflow-hidden h-40 flex">
                    <img class="mx-auto my-auto w-40 object-cover float-left"
                        src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
    </div>
    <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
        <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
        <p class="text-gray-700">
            Rp {{$product->price}} {{$maxjordan}}
        </p>
    </div>
</div>

@endif
@endforeach --}}
</div>
</div>
</div>


</div>
<div class="flex justify-between w-12 mx-auto pb-2">
    <button id="sButton3" onclick="sliderButton3()" class="bg-gray-400 rounded-full w-4 pb-2 "></button>

    <button id="sButton4" onclick="sliderButton4() " class="bg-gray-400 rounded-full w-4 p-2"></button>
</div>
<div class="sliderAx w-full h-96 px-48 py-10">
    <div class="flex justify-between px-5">
        <div>
            <h1 class="text-2xl font-bold">ADIDAS YEEZY</h1>
        </div>
        <div>
            <form action="{{route('caribarang')}}" method="GET" role="search">
                @csrf
                <button value="Yeezy" name="term" type="submit" class="underline">view all</button>
            </form>
        </div>
    </div>

    <div id="slider-5" class="container mx-auto">
        <div class="py-16 grid grid-cols-1 xl:grid-cols-5 gap-5">
            <!--Card 1-->
            @foreach($yeezys2 as $key=> $product)
            @if($key<5) <div class="overflow-hidden">

                <div class="overflow-hidden h-40 flex">
                    <a class="mx-auto my-auto w-40 object-cover float-left"
                        href="{{route('detailbarang', $product->id)}}">
                        <img src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
                    </a>
                </div>
                <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
                    <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
                    <p class="text-gray-700">
                        Rp {{$product->price}}
                    </p>
                </div>
        </div>

        @endif
        @endforeach
    </div>
</div>
<div id="slider-6" class="container mx-auto">
    <div class="py-16 grid grid-cols-1 xl:grid-cols-5 gap-5">
        <!--Card 6-->
        @foreach($yeezys2 as $key=> $product)
        @if($key>4 && $key<10 ) <div class="overflow-hidden">

            <div class="overflow-hidden h-40 flex">
                <a class="mx-auto my-auto w-40 object-cover float-left" href="{{route('detailbarang', $product->id)}}">
                    <img src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
                </a>
            </div>
            <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
                <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
                <p class="text-gray-700">
                    Rp {{$product->price}}
                </p>
            </div>
    </div>

    @endif
    @endforeach
</div>
</div>
</div>
<div class="flex justify-between w-12 mx-auto pb-2">
    <button id="sButton5" onclick="sliderButton5()" class="bg-gray-400 rounded-full w-4 pb-2 "></button>
    <button id="sButton6" onclick="sliderButton6() " class="bg-gray-400 rounded-full w-4 p-2"></button>
</div>
<div class="sliderAx w-full h-96 px-48 py-10">
    <div class="flex justify-between px-5">
        <div>
            <h1 class="text-2xl font-bold">NIKE</h1>
        </div>
        <div>
            <form action="{{route('caribarang')}}" method="GET" role="search">
                @csrf
                <button value="Nike" name="term" type="submit" class="underline">view all</button>
            </form>
        </div>
    </div>

    <div id="slider-1" class="container mx-auto">
        <div class="py-16 grid grid-cols-1 xl:grid-cols-5 gap-5">
            <!--Card 1-->
            @foreach($nikes2 as $key=> $product)
            @if($key<5 ) <div class="overflow-hidden ">

                <div class="overflow-hidden h-40 flex">
                    <a class="mx-auto my-auto w-40 object-cover float-left"
                        href="{{route('detailbarang', $product->id)}}">
                        <img src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
                    </a>
                </div>
                <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
                    <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
                    <p class="text-gray-700">
                        Rp {{$product->price}}
                    </p>
                </div>
        </div>

        @endif
        @endforeach
    </div>
</div>
<div id="slider-2" class="container mx-auto">
    <div class="py-16 grid grid-cols-1 xl:grid-cols-5 gap-5">
        <!--Card 6-->
        @foreach($nikes2 as $key=> $product)
        @if($key>4 && $key<10 ) <div class="overflow-hidden">

            <div class="overflow-hidden h-40 flex">
                <a class="mx-auto my-auto w-40 object-cover float-left" href="{{route('detailbarang', $product->id)}}">
                    <img src="{{route('images.displayImage',$product->file)}}" alt="Mountain">
                </a>
            </div>
            <div class="px-6 pt-2 pb-4 justify-center align-center items-center text-center">
                <div class="font-semibold text-xl mb-2">{{$product->name}}</div>
                <p class="text-gray-700">
                    Rp {{$product->price}}
                </p>
            </div>

    </div>

    @endif
    @endforeach
</div>
</div>
</div>
<div class="flex justify-between w-12 mx-auto pb-2 mb-16">
    <button id="sButton1" onclick="sliderButton1()" class="bg-gray-400 rounded-full w-4 pb-2 "></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-gray-400 rounded-full w-4 p-2"></button>
</div>
<footer class="footer bg-black relative pt-1 ">
    <div class=" container mx-auto px-64">
        <div class="sm:flex sm:mt-8">
            <div class="mt-8 sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
                <img src="/images/senikersku.webp" alt="" class="h-20 my-auto">
                <div class="flex flex-col">
                    <span class="font-bold text-white uppercase mt-4 md:mt-0 mb-2">Senikersku</span>
                    <span class="my-2"><a href="" class="text-gray-300  text-md hover:text-blue-500">Jl. Kalisari Utara
                            I No.60</a></span>
                    <span class="my-2"><a href="https://www.instagram.com/senikersku/" target="_blank"
                            class="text-gray-300  text-md hover:text-blue-500">Instagram</a></span>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-white uppercase mt-4 md:mt-0 mb-2">Customer Service</span>
                    <span class="my-2"><a href="#" class="text-gray-300  text-md hover:text-blue-500">Contact
                            Us</a></span>
                    <span class="my-2"><a href="#" class="text-gray-300  text-md hover:text-blue-500">Payment
                            Confirmation</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
            <div class="text-center py-3">
                <p class="text-sm text-white font-bold mb-2">
                    © 2021 by C09
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
@endsection
