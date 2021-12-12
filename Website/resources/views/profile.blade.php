@extends('layouts.navbar')

@section('content')
@if(Auth::user())
<div>
    <div class="flex flex-col items-end border-b-2 border-gray-200">
        <h2 class="text-gray-400 py-4 px-20 mr-10">Home / My Account</h2>
    </div>
    <div class="grid grid-cols-3">
        <div class="grid-span-1 border-r-2 border-gray-200">
            <ul class="pt-16 pl-28">
                <li>
                    <button class="bg-black rounded-md px-6 py-2 text-lg text-white font-semibold" type="button">
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
                    <button
                        class="bg-white rounded-md px-6 py-2 text-lg text-black font-semibold hover:bg-black hover:text-white"
                        type="button">
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
            <div class="grid grid-col-3 pt-16 pl-36">
                <h1 class="text-3xl font-bold">
                    My Account
                </h1>
                <ul class="pt-6 text-lg">
                    <li class="pt-6">
                        <span class="mr-28 font-bold">Name</span>
                        <span class="ml-2">:</span>
                        <span class="ml-5">{{$user->name}}</span>
                    </li>
                    <li class="pt-6">
                        <span class="mr-28 font-bold">Email</span>
                        <span class="ml-3">:</span>
                        <span class="ml-5">{{$user->email}}</span>
                    </li>
                    <li class="pt-6">
                        <span class="mr-10 font-bold">Phone Number</span>
                        <span class="ml-1"> :</span>
                        <span class="ml-5">{{$user->phone}}</span>
                    </li>
                    <li class="pt-6">
                        <span class="mr-20 font-bold">Address</span>
                        <span class="pl-2 ml-3">:</span>
                        <span class="ml-5">{{$user->address}}</span>
                    </li>
                    <li class="pt-6">
                        <span class="mr-16 font-bold">Postal Code</span>
                        <span class="ml-1">:</span>
                        <span class="ml-5">{{$user->postalcode}}</span>
                    </li>
                    <div class="flex flex-col items-end pt-14 px-48">
                        <button class="bg-black rounded-md px-6 py-2 text-sm text-white font-semibold" type="button">
                            <a href="{{route('editprofile')}}">Change</a>
                        </button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
