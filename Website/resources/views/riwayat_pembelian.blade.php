@extends('layouts.navbar')

@section('content')
<div class="flex flex-col items-end border-b-2 border-gray-200">
    <h2 class="text-gray-400 py-4 px-20 mr-10">Home / History</h2>
</div>
<div class="grid grid-cols-3">
    <div class="grid-span-1 border-r-2 border-gray-200">
        <ul class="pt-16 pl-28">
            <li>
                <button
                    class="bg-white rounded-md px-6 py-2 text-lg text-black font-semibold hover:bg-black hover:text-white"
                    type="button">
                    <a href="{{route('profile')}}">My Account</a>
                </button>
            </li>
            <li class="pt-8">
                <button
                    class="bg-white rounded-md px-6 py-2 text-lg text-black font-semibold hover:bg-black hover:text-white"
                    type="button">
                    <a href="{{route('track')}}">Track Shipping</a>
                </button>
            </li>
            <li class="pt-8">
                <button
                    class="bg-white rounded-md px-6 py-2 text-lg text-black font-semibold hover:bg-black hover:text-white"
                    type="button">
                    <a href="{{route('wishlist')}}">Wishlist</a>
                </button>
            </li>
            <li class="pt-8">
                <button class="bg-black rounded-md px-6 py-2 text-lg text-white font-semibold" type="button">
                    <a href="{{route('history')}}">History</a>
                </button>
            </li>
            <li class="pt-8">
                <form method="POST" action="{{route('signout.post')}}">
                    @csrf
                    <button
                        class="bg-white rounded-md px-6 py-2 text-lg text-black font-semibold hover:bg-black hover:text-white"
                        type="submit">
                        Sign Out
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <div class="col-span-2 col-start-2">
        <div class="grid grid-col-3 pt-16 px-36">
            <h1 class="text-3xl font-bold">
                History
            </h1>
            <ul class="pt-6 text-lg divide-y">
                @foreach($completeds as $item)
                <li class="flex pt-6 items-center">
                    <span class="mr-20"><img src="{{ route('images.displayImage',$item->file) }}" alt=""
                            class="w-48"></span>
                    <ul class="">
                        <li class="text-lg font-bold">{{$item->name}}</li>
                        <li class="text-md">Order has arrived</li>
                    </ul>
                    <div class="flex flex-col items-center pt-14 pl-28">
                        <button class="bg-black rounded-md px-6 py-2 text-sm text-white font-semibold" type="button">
                            <a href="">Give Review</a>
                        </button>
                    </div>
                </li>
                @endforeach
                @foreach($ongoings as $item)
                <li class="flex pt-6 items-center">
                    <span class="mr-20"><img src="{{ route('images.displayImage',$item->file) }}" alt=""
                            class="w-48"></span>
                    <ul class="">
                        <li class="text-lg font-bold">{{$item->name}}</li>
                        <li class="text-md">Order is being verified</li>
                        <li class="underline text-sm">
                            <a href="{{route('track')}}">Track Shipping</a>
                        </li>
                    </ul>
                    <div class="flex flex-col items-center pt-14 pl-36">
                        <button class="bg-gray-200 rounded-md px-6 py-2 text-sm text-gray-400 font-semibold"
                            type="button" disabled>
                            Give Review
                        </button>
                    </div>
                </li>
                @endforeach
                @foreach($cancelleds as $item)
                <li class="flex pt-6 items-center">
                    <span class="mr-20"><img src="{{ route('images.displayImage',$item->file) }}" alt=""
                            class="w-48"></span>
                    <ul class="">
                        <li class="text-lg font-bold">{{$item->name}}</li>
                        <li class="text-md">Order has been cancelled</li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
