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
    <style>
        .shoes:hover #hoveritem1 {
            display: none;
        }

        .shoes:hover #hoveritem2 {
            display: block;
        }

        .shoes:hover #hovertext {
            margin-left: 2rem;
        }

        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
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
                        <button
                            class="shoes bg-black border-2 border-white rounded-md px-2 py-2 w-full h-12 text-white hover:bg-white hover:border-black hover:text-black">
                            <a href="{{route('admin')}}" class="flex items-center">
                                <img src="/images/home-white.png" alt="" id="hoveritem1" class="relative w-8 pl-1">
                                <img src="/images/home-black.png" alt="" id="hoveritem2"
                                    class="absolute w-8 pl-1 hidden">
                                <span class="pl-4" id="hovertext">Home</span>
                            </a>
                        </button>
                    </li>
                    <li class="mt-6 px-10 w-full h-12">
                        <button class="bg-white rounded-md px-2 py-2 w-full h-12">
                            <a href="{{route('additem')}}" class="flex items-center">
                                <img src="/images/shoes-black.png" alt="" class="w-8 pl-1">
                                <span class="pl-4">Add Item</span>
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
                <h1 class="pl-10 mt-10 text-3xl font-bold">
                    Item Menu
                </h1>
                <div class="flex flex-col pt-14 pl-10">
                    <label class="flex items-center mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold">ID</span>
                    </label>
                    @foreach($products as $product)

                    <label class="flex items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">{{$product->id}}</span>
                    </label>
                    @endforeach

                    <button class="modal-open bg-black rounded-md px-2 py-2 w-full h-10 text-white mt-5">
                        <a href="" class="flex items-center">
                            <img src="/images/add.png" alt="" class="w-6 ml-4">
                            <span class="pl-4">Add New Item</span>
                        </a>
                    </button>

                    <div
                        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                        <div
                            class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                            <div
                                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                                <span class="text-sm">(Esc)</span>
                            </div>
                            <div class="modal-content py-4 text-left px-6">
                                <form method="POST" action="{{route('additem.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex justify-between items-center pb-3">
                                        <p class="text-2xl font-bold">Add New Item</p>
                                        <div class="modal-close cursor-pointer z-50">
                                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg"
                                                width="18" height="18" viewBox="0 0 18 18">
                                                <path
                                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>

                                    <ul class="text-lg">
                                        <li class="pt-6">
                                            <span class="font-bold">Item Name :</span><br>
                                            <span class=""><input
                                                    class="border-2 border-gray-500 rounded w-full py-1 px-3 text-gray-700"
                                                    id="name" name="name" type="text" placeholder=""></span>
                                        </li>
                                        <li class="pt-6">
                                            <span class="font-bold">Item Category :</span><br>
                                            <span class=""><input
                                                    class="border-2 border-gray-500 rounded w-full py-1 px-3 text-gray-700"
                                                    id="category" name="category" type="text" placeholder=""></span>
                                        </li>
                                        <li class="pt-6">
                                            <span class="font-bold">Price :</span><br>
                                            <span class=""><input
                                                    class="border-2 border-gray-500 rounded w-full py-1 px-3 text-gray-700"
                                                    id="price" name="price" type="text" placeholder=""></span>
                                        </li>

                                        <!-- <li class="pt-6">
                                            <span class="font-bold">Size </span><br>
                                            <span class=""><input
                                                    class="border-2 border-gray-500 rounded w-full py-1 px-3 text-gray-700"
                                                    id="price" name="size" type="text" placeholder=""></span>
                                        </li>
                                        <li class="pt-6">
                                            <span class="font-bold">Stock :</span><br>
                                            <span class=""><input
                                                    class="border-2 border-gray-500 rounded w-full py-1 px-3 text-gray-700"
                                                    id="stock" name="stock" type="text" placeholder=""></span>
                                        </li> -->
                                        <li class="flex flex-col pt-6">
                                            <span class="font-bold pb-2">Item Image :</span>
                                            <div class="flex items-center">
                                                <label
                                                    class="pt-2 bg-white rounded-md border-2 border-black px-6 py-2 text-sm text-black font-semibold cursor-pointer hover:bg-gray-100 mr-72">
                                                    Add File
                                                    <input type="file" name="file" class="hidden">
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="flex justify-end pt-2">
                                        <button
                                            class="modal-close px-6 bg-black py-2 rounded-lg text-white hover:text-gray-200"
                                            type="submit">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-span-2 col-start-6 w-full">
                <h1 class="mt-10 text-3xl font-bold text-white">
                    .
                </h1>
                <div class="flex flex-col pt-14">
                    <label class="flex flex-col items-center mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold">Item Name</span>
                    </label>
                    @foreach($products as $product)

                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <a href="{{route('editdetail' , $product->id)}}"><span
                                class="ml-6 text-lg font-semibold">{{$product->name}}</span></a>
                    </label>
                    @endforeach

                </div>
            </div>
            <div class="col-span-2 col-start-8 w-full">
                <h1 class="mt-10 text-3xl font-bold text-white">
                    .
                </h1>
                <div class="flex flex-col pt-14">
                    <label class="flex flex-col items-center mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold">Image File</span>
                    </label>
                    @foreach($products as $product)

                    <label class="flex flex-col items-center py-4 border-b-2 border-black">
                        <span class="ml-6 text-lg font-semibold">{{$product->file}}</span>
                    </label>
                    <!-- <span class="flex ml-8 my-auto w- items-center"><img class="mx-auto"
                            src="{{route('images.displayImage',$product->file)}}" alt="" class="h-52"></span> -->
                    @endforeach


                </div>
            </div>
            <div class="col-span-3 col-start-10 w-full">
                <h1 class="mt-10 text-3xl font-bold text-white">
                    .
                </h1>
                <div class="flex flex-col pt-14 pr-10">
                    <label class="flex flex-col items-end mt-3 pb-2 border-b-2 border-black">
                        <span class="ml-6 text-xl font-bold pr-12">Cost</span>
                    </label>
                    @foreach($products as $product)
                    <div class="flex flex-col items-end border-b-2 border-black">
                        <label class="flex items-center py-4">
                            <span class="ml-6 text-lg font-semibold pr-6">Rp {{$product->price}}</span>
                            <span> <a href="{{route('edititem', $product->id)}}"><button class=""><img
                                            src="/images/more.png" alt="" class="w-6 h-1.5"></button></a> </span>
                        </label>
                    </div>
                    @endforeach

                </div>
                <div class="flex flex-row mt-4 w-full justify-center">
                    <div>
                        <div>
                            {{ $products->links('landingpaginator') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function (event) {
                event.preventDefault()
                toggleModal()
            })
        }
        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)
        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }
        document.onkeydown = function (evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };

        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

    </script>
</body>

</html>
