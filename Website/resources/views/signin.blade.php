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
    <form method="POST" action="{{route('signin.post')}}">
        @csrf
        <div class="grid grid-cols-5 h-full">
            <div class="flex flex-col col-start-1 col-span-3">
                <div class="py-10 text-center">
                    <h1 class="text-3xl font-bold">
                        Sign In to Senikersku
                    </h1>
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
                <div class="px-48 pt-4">
                    <a href="/public/forgot_password.html"
                        class="text-l font-semibold pb-2 underline text-blue-700">Forgot Password</a>
                </div>
                <!-- <span class="text-gray-400 px-48 pt-24">Or sign up with</span> -->
                <div class="flex px-48 my-5 justify-end">
                    <!-- <div class="flex items-end">
                        <button class="bg-white rounded-full w-8 h-8" type="button">
                            <a href="/public/landing_page.html"><img src="/images/facebook.png" alt=""
                                    class="w-8 h-8"></a>
                        </button>
                        <button class="bg-white rounded-full w-8 h-8 ml-10" type="button">
                            <a href="/public/admin_home.html"><img src="/images/google.png" alt="" class="w-8 h-8"></a>
                        </button>
                    </div> -->
                    <div class="">
                        <button class="bg-black rounded-xl px-6 py-2 border-4 text-white text-xl font-semibold"
                            type="submit">
                            Sign In
                        </button>
                    </div>
                    <!-- <div class="pt-14">
                        <img src="/public/images/google.png" alt="" class="w-8">
                    </div> -->
                </div>
                <div class="flex px-48 justify-end">
                    <span class="font-semibold">Don't have an account?</h2>
                        <a href="{{route('signup')}}"><span class="font-semibold text-blue-700 underline">Sign
                                up</span></a>
                </div>
            </div>
            <div style="background-image: url('/images/signin.png')"
                class="bg-cover bg-local relative col-span-2 col-start-4">
                <img src="/images/signup.png" alt="" class="object-contain">
            </div>
        </div>
    </form>
</body>

</html>
