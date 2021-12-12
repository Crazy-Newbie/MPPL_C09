@extends('layouts.navbar')

@section('content')
<div class="flex flex-col items-end border-b-2 border-gray-200">
    <h2 class="text-gray-400 py-4 px-20 mr-10">Home / Ulasan</h2>
</div>
<div class="grid grid-cols-3">
    <div class="grid-span-1 flex flex-col items-center pt-48">
        <h2 class="font-bold text-2xl">Air Force 1 X GD LOW</h2>
        <img src="/images/gd.png" alt="" class="w-72 pt-5">
    </div>
    <div class="col-span-2 col-start-2 px-20 pt-20 mr-56">
        <h1 class="text-3xl font-bold pb-5">
            Review:
        </h1>
        <textarea name="ulasan" id="ulasan" cols="30" rows="12" class="border-2 border-gray-500 rounded w-full py-3 px-4 text-gray-700" placeholder="Write your comment here..."></textarea>
        <div class="flex flex-col items-start pt-5">
            <div class="flex">
                <div class="pt-3">
                    <label class="bg-white rounded-md border-2 border-black px-6 py-2 text-sm text-black font-semibold cursor-pointer">
                        Add File
                        <input type="file" class="hidden">
                    </label>
                </div>
                <div class="ml-36 pt-1">
                    <button class="bg-black rounded-md px-10 py-2 text-md text-white font-semibold" type="button">
                        <a href="/public/ubahDetail.html">Submit</a>
                    </button>
                </div>              
            </div>
        </div>
    </div>
</div>
@endsection
