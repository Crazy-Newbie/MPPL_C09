@extends('layouts.navbar')

@section('content')
<div class="flex flex-col items-center">
    <h1 class="font-bold text-4xl pt-8">WISHLIST</h1>
</div>
<h2 class="font-semibold text-xl pt-6 flex justify-center">{{$countwishlist}} Items</h2>
@foreach($products as $product)
<div class="pt-6 px-64 flex justify-center">
    <div class="relative flex container w-6/12 h-64 border-2 border-black rounded-md mb-5">
        <span class="flex ml-8 my-auto w-52 items-center"><img class="mx-auto"
                src="{{route('images.displayImage',$product->file)}}" alt="" class="h-52"></span>
        <ul class="my-auto ml-10 flex flex-col">
            <li class="absolute grid justify-end top-4 right-4 w-5 h-5">
                <!-- <form action="{{route('destroywishlist.post')}}" method="POST"> @csrf <input type="hidden"
                        name="product_id" value="{{$product->product_id}}" id=""><button type="submit"><img
                            src="/images/x_mark.png" alt="" class=""></button></form> -->
                <form class="" method="POST" action="{{route('destroywishlist.post')}}">
                    @csrf
                    @if(Auth::user())
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    @else
                    <input type="hidden" name="user_id" value="-1">
                    @endif
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <button type="submit">
                        <img src="/images/x_mark.png" alt="" class="">
                    </button>
                </form>
            </li>
            <li class="text-3xl font-bold">{{$product->name}}</li>
            <li class="pt-1 text-lg font-semibold"> Rp {{$product->price}}</li>
            <!-- <div>
                <ul class="flex pt-14">
                    <div @click.away="open = false" class="relative font-semibold" x-data="{ open: false }">
                        <button @click="open = !open" class="rounded-md border-2 border-gray-700 px-2 py-1">
                          <span>Choose Size</span>
                          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">38</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">40</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">42</a>
                          </div>
                        </div>
                    </div>
                    <li class="font-semibold text-white pl-24">
                        <button class="flex rounded-md border-2 border-black bg-black px-4 py-1">
                            <img src="/images/cart2.png" alt="" class="w-5 h-5">
                            <span class="ml-4 font-semibold">Add to Shopping Cart</span>
                        </button>
                    </li>
                </ul>
            </div> -->
        </ul>
    </div>
</div>
@endforeach
@endsection
