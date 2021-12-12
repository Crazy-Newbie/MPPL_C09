<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <title>Senikersku</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        input:checked~.dot {
            transform: translateX(100%);
            background-color: #48bb78;
        }

    </style>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        input:checked+label {
            border-color: black;
            background-color: black;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

    </style>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script>
        function changecheckbox() {
            document.getElementById("toogle").value = '1';
            // x = document.getElementById("toogle");
            // if(x.value == 0){
            //     x.value = "1";
            // }
            // else(x.value == 1){
            //     x.value = "0";
            // }
        }
        var cont = 0;

        function multiply(key) {
            // Get the input values
            x = parseInt(document.getElementById('amount' + key).innerHTML);
            y = parseInt(document.getElementById('price' + key).innerHTML);
            a = Number(document.getElementById('amount' + key).value);
            b = Number(document.getElementById('price' + key).value);

            // Do the multiplication
            c = x * y;

            // Set the value of the total
            // console.log(x);
            // console.log('total' + key);
            document.getElementById('total' + key).innerHTML = c;
        }

        function total(key) {
            // console.log(key);
            totalprice = 0;
            for (let i = 0; i < key; i++) {
                x = parseInt(document.getElementById('total' + i).innerHTML);
                totalprice += x;
                console.log('total = ' + totalprice);




            }
            tax = totalprice / 10;
            document.getElementById('productstotal').innerHTML = totalprice;
            document.getElementById('tax').innerHTML = totalprice / 10;
            document.getElementById('total').innerHTML = totalprice + tax + 10000;
        }

        function loopSlider() {
            var xx = setInterval(function () {
                switch (cont) {
                    case 0: {
                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton1").removeClass("bg-gray-800");
                        $("#sButton2").addClass("bg-gray-800");
                        $("#slider-4").fadeOut(400);
                        $("#slider-3").delay(400).fadeIn(400);
                        $("#sButton4").removeClass("bg-gray-800");
                        $("#sButton3").addClass("bg-gray-800");
                        $("#slider-6").fadeOut(400);
                        $("#slider-5").delay(400).fadeIn(400);
                        $("#sButton6").removeClass("bg-gray-800");
                        $("#sButton5").addClass("bg-gray-800");
                        cont = 1;

                        break;
                    }
                    case 1: {

                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton2").removeClass("bg-gray-800");
                        $("#sButton1").addClass("bg-gray-800");
                        $("#slider-4").fadeOut(400);
                        $("#slider-3").delay(400).fadeIn(400);
                        $("#sButton4").removeClass("bg-gray-800");
                        $("#sButton3").addClass("bg-gray-800");
                        $("#slider-6").fadeOut(400);
                        $("#slider-5").delay(400).fadeIn(400);
                        $("#sButton6").removeClass("bg-gray-800");
                        $("#sButton5").addClass("bg-gray-800");

                        cont = 0;

                        break;
                    }


                }
            }, 8000);

        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }



        function sliderButton1() {

            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-gray-800");
            $("#sButton1").addClass("bg-gray-800");
            reinitLoop(4000);
            cont = 0;
        }

        function sliderButton2() {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-gray-800");
            $("#sButton2").addClass("bg-gray-800");
            reinitLoop(4000);
            cont = 1;
        }

        function sliderButton3() {

            $("#slider-4").fadeOut(400);
            $("#slider-3").delay(400).fadeIn(400);
            $("#sButton4").removeClass("bg-gray-800");
            $("#sButton3").addClass("bg-gray-800");
            reinitLoop(4000);
            cont = 0;
        }

        function sliderButton4() {
            $("#slider-3").fadeOut(400);
            $("#slider-4").delay(400).fadeIn(400);
            $("#sButton3").removeClass("bg-gray-800");
            $("#sButton4").addClass("bg-gray-800");
            reinitLoop(4000);
            cont = 1;
        }

        function sliderButton5() {

            $("#slider-6").fadeOut(400);
            $("#slider-5").delay(400).fadeIn(400);
            $("#sButton6").removeClass("bg-gray-800");
            $("#sButton5").addClass("bg-gray-800");
            reinitLoop(4000);
            cont = 0;
        }

        function sliderButton6() {
            $("#slider-5").fadeOut(400);
            $("#slider-6").delay(400).fadeIn(400);
            $("#sButton5").removeClass("bg-gray-800");
            $("#sButton6").addClass("bg-gray-800");
            reinitLoop(4000);
            cont = 1;
        }


        $(document).ready(function () {
            $("#slider-2").hide();
            $("#slider-4").hide();
            $("#slider-6").hide();
            $("#sButton1").addClass("bg-gray-800");
            $("#sButton3").addClass("bg-gray-800");
            $("#sButton5").addClass("bg-gray-800");
            loopSlider();
        });

    </script>
</head>

<body>
    <nav class="flex bg-black text-center">
        <div class="w-3/5">
            <ul class="flex justify-center">
                <li class="px-8 py-4 text-white font-semibold hover:text-gray-300 text-xl">
                    <a href="{{route('landing')}}">
                        <img src="/images/senikersku.webp" alt="" class="h-10">
                    </a>
                </li>
                <li class="px-8 my-auto text-white font-semibold hover:text-gray-300 text-l">
                    <form action="{{route('caribarang')}}" method="GET" role="search">
                        @csrf
                        <button value="Jordan" name="term" type="submit" >AIR JORDAN</button>
                    </form>
                </li>
                <li class="px-8 my-auto text-white font-semibold hover:text-gray-300 text-l">
                    <form action="{{route('caribarang')}}" method="GET" role="search">
                        @csrf
                        <button value="Yeezy" name="term" type="submit" >ADIDAS YEEZY</button>
                    </form>
                </li>
                <li class="px-8 my-auto text-white font-semibold hover:text-gray-300 text-l">
                    <form action="{{route('caribarang')}}" method="GET" role="search">
                        @csrf
                        <button value="Nike" name="term" type="submit" >NIKE</button>
                    </form>
                </li>
                <li class="px-8 my-auto text-white font-semibold hover:text-gray-300 text-l">
                    <a href="{{route('caribarang')}}">BROWSE ALL</a>
                </li>
            </ul>
        </div>
        <div class="w-2/5 py-5">
            <ul class="flex justify-end px-20 mr-10">
                <li class="px-2 text-white font-semibold hover:text-gray-300">
                    <a href="{{route('wishlist')}}"><img src="/images/wishlist.png" alt="" class="w-8 h-8"></a>
                </li>
                <li class="px-2 text-white font-semibold hover:text-gray-300">
                    <a href="{{route('cartpage')}}"><img src="/images/cart.png" alt="" class="w-8 h-8"></a>
                </li>
                <li class="px-2 text-white font-semibold hover:text-gray-300">
                    <a href="{{route('profile')}}"><img src="/images/account.png" alt="" class="w-8 h-8"></a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <script>
        const targetDiv = document.getElementById("bankdisplay");
        const btn1 = document.getElementById("bankbutt");
        const targetDiv2 = document.getElementById("emoneydisplay");
        const btn2 = document.getElementById("emoneybutt");
        const btn3 = document.getElementById("emoneybutt2");    
        btn1.onclick = function() {  
            console.log("d", targetDiv.style.display)
            if(targetDiv.style.display !== "none")
            {
                targetDiv.style.display = "none";
            }
            if(targetDiv.style.display === "block")
            {
                targetDiv.style.display = "block";
            }
            else
            {
                targetDiv.style.display = "block";
            }
            if(targetDiv2.style.display === "block")
            {
                targetDiv2.style.display = "none";
            }
        }
        btn2.onclick = function()
        {
            if(targetDiv2.style.display === "none")
            {
                targetDiv2.style.display = "none";
            }
            if(targetDiv2.style.display === "block")
            {
                targetDiv2.style.display = "block";
            }
            else
            {
                targetDiv2.style.display = "block";
            }
            if(targetDiv.style.display === "block")
            {
                targetDiv.style.display = "none";
            }
        }
        btn3.onclick = function()
        {
            if(targetDiv2.style.display === "none")
            {
                targetDiv2.style.display = "none";
            }
            if(targetDiv2.style.display === "block")
            {
                targetDiv2.style.display = "block";
            }
            else
            {
                targetDiv2.style.display = "block";
            }
            if(targetDiv.style.display === "block")
            {
                targetDiv.style.display = "none";
            }
        }
    </script>
</body>

</html>
