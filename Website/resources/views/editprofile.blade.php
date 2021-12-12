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
                        <a href="/public/akun.html">My Account</a>
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
                        <a href="/public/wishlist.html">Wishlist</a>
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
        <form method="POST" action="{{route('editprofile.post')}}">
            @csrf
            <div class="col-span-2 col-start-2">
                <div class="grid grid-col-3 pt-16 pl-36">
                    <h1 class="text-3xl font-bold">
                        Change Account Details
                    </h1>
                    <ul class="pt-6 text-lg">
                        <li class="pt-6">
                            <span class="mr-28 font-bold">Name</span>
                            <span class="ml-2">:</span>
                            <span class="ml-5"><input
                                    class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700" id="name"
                                    type="text" name="name" placeholder="Name"></span>
                        </li>
                        <li class="pt-6">
                            <span class="mr-28 font-bold">Email</span>
                            <span class="ml-3">:</span>
                            <span class="ml-5"><input
                                    class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700" id="email"
                                    type="email" name="email" placeholder="YourEmail@gmail.com"></span>
                        </li>
                        <li class="pt-6">
                            <span class="mr-10 font-bold">Phone Number</span>
                            <span class="ml-1">:</span>
                            <span class="ml-5"><input
                                    class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700" id="no_telp"
                                    type="text" name="phone" placeholder=""></span>
                        </li>
                        <li class="pt-6">
                            <span class="mr-20 font-bold">Address</span>
                            <span class="pl-2 ml-3">:</span>
                            <span class="ml-5"><input
                                    class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700" id="alamat"
                                    type="text" name="address" placeholder=""></span>
                        </li>
                        <li class="pt-6">
                            <span class="mr-16 font-bold">Postal Code</span>
                            <span class="ml-1">:</span>
                            <span class="ml-5"><input
                                    class="border-2 border-gray-500 rounded w-1/2 py-1 px-3 text-gray-700" id="kode_pos"
                                    type="text" name="postalcode" placeholder=""></span>
                        </li>
                        <div class="flex flex-col items-end pt-14 px-48 mr-20">
                            <button class="bg-black rounded-md px-6 py-2 text-sm text-white font-semibold"
                                type="submit">
                                Save
                            </button>
                        </div>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endsection
