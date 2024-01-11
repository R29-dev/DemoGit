<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- {{ asset('') }} --}}
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('rate/css/rate.css') }}">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head><!--/head-->

<body>
  
    


    @include('Frontend.layouts.header')

   

    <section>
        <div class="container">
            <div class="row">
                
                 
                 @include('Frontend.layouts.menu-left')

                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>


            </div>
        </div>
    </section>

    @include('Frontend.layouts.footer')

    <script src="js/jquery.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {



            var ids = 0;

            var mangCol4 = $(".text-center");
            mangCol4.map((elementValue, arrayIndex) => {
                $(arrayIndex).attr("id", ids);
                ids++;
            });

            $(".add-to-cart").click(function() {





                var product = {}
                var obj = {};



                var data = localStorage.getItem("formMang");
                if (data) {
                    obj = JSON.parse(data);
                }

                var index = $(this).closest(".single-products").find(".text-center").attr("id")
                console.log(index)
                var name = $(this).closest(".single-products").find(".text-center").find("p").text();
                var price = $(this).closest(".single-products").find(".text-center").find("h2").text();
                var img = $(this).closest(".single-products").find(".text-center").find("img").attr("src");

                product.ids = index;
                product.name = name;
                product.img = img;
                product.price = price;
                product.qual = 1;


                Object.keys(obj).map(function(key, index) {
                    if (obj[key].ids === product.ids) {
                        product.qual = (+obj[key].qual) + product.qual;
                    }

                });

                obj["product" + product.ids] = product;
                var formMang = JSON.stringify(obj);
                localStorage.setItem("formMang", formMang);

            });
        });
    </script>

    <script src="{{ asset('rate/js/jquery-1.9.1.min.js') }} "></script>
    @yield('jsRate')

</body>

</html>
