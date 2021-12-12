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

<body class="bg-gray-100">
    <form method="POST" action="{{route('signup.post')}}">
        @csrf
        <div class="grid grid-cols-5">
            <div style="background-image: url('/images/signup.png')"
                class="bg-cover h-landing bg-local relative col-span-2">
                <img src="/images/signup.png" alt="" class="object-contain">
            </div>
            <div class="flex flex-col col-start-3 col-span-3 ">
                <div class="py-10 text-center">
                    <h1 class="text-3xl font-bold">
                        Sign Up to Senikersku
                    </h1>
                </div>
                <div class="px-48">
                    <h2 class="text-xl font-semibold pb-2">Name</h2>
                    <input
                        class="shadow-lg appearance-none rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" name="name" type="text" placeholder="Name">
                </div>
                <div class="px-48 py-10">
                    <h2 class="text-xl font-semibold pb-2">Email</h2>
                    <input
                        class="shadow-lg appearance-none rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" placeholder="YourEmail@gmail.com">
                </div>
                <div class="px-48">
                    <h2 class="text-xl font-semibold pb-2">Password</h2>
                    <input
                        class="shadow-lg appearance-none rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" placeholder="8 Characters Minimum">
                </div>
                <div class="flex flex-col items-end my-6 px-48">
                    <button class="bg-black rounded-xl px-6 py-2 border-4 text-white text-xl font-semibold"
                        type="submit">
                        Sign Up
                    </button>
                </div>
                <div class="flex px-48 justify-end">
                    <span class="font-semibold justify-end">Already have an account?</h2>
                        <a href="{{route('signin')}}"><span class="font-semibold text-blue-700 underline">Sign
                                in</span></a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
