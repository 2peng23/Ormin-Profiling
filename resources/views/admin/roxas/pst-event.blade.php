<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="admin/dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Roxas</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="admin/dist/css/app.css" />
        <!-- END: CSS Assets-->

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        {{-- Carousel --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300&display=swap" rel="stylesheet">

        

        <style>
            /* Modal for Registration */
          .event-modal{
            display: none;
            position: fixed;
            z-index: 2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            
          }
          .modal-content{
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid grey;
            width: 900px;

          }

          .close{
            color: black;
            float: right;
            font-size: 30px;
            font-weight: bolder;
            cursor: pointer;
          }
          .user-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 700px;
            max-width: 80%;
            }

            .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            }

            .close:hover,
            .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
            }

            /* add-event css  */
            /* Form Styles */
            form {
            margin-top: 20px;
            }

            label {
            display: block;
            margin-bottom: 5px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            }

            .owl-carousel .item {
            margin: 10px auto   ;
            }
            .owl-carousel .item img {
            display: block;
            width: 405px;
            height: 250px;
            }
            .owl-prev,
            .owl-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(17, 156, 109, 0.5);
            color: #fff;
            font-size: 30px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: background-color 0.3s;
            z-index: 1;
            }
            .owl-prev:hover,
            .owl-next:hover {
            background-color: rgba(37, 174, 112, 0.8);
            }
            .owl-prev {
            left: 10px;
            }
            .owl-next {
            right: 10px;
            }

            .item {
                border: 1px solid #ccc;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
                padding: 10px;
                display: inline-block;
            }


            
            

        </style>
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">

        @include('admin.roxas.mobile')

        <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
            @include('admin.roxas.sidebar')

            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Roxas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Past Event</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                </div>
                <!-- END: Top Bar -->
                {{-- Message --}}
                @if(session()->has('message'))
                    <div class="alert alert-danger mt-3">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif 

                @php
                    $showEvents = $event->filter(function($data) {
                        $eventDate = strtotime($data->date);
                        $currentDate = strtotime(date('Y-m-d'));
                        $isPastDate = $eventDate < $currentDate;
                        return $isPastDate;
                    });
                @endphp

                @if($showEvents->isEmpty())
                    <div class="mt-5 text-center">No events available.</div>
                @else
                    <div class="mt-5 owl-carousel p-2">
                        @foreach($showEvents as $data)
                            <div class="item" style="height: 450px;position: relative;">
                                <img class="" src="eventimage/{{$data->photo}}" alt="">
                                <p class="text-center text-uppercase p-3" style="font-family: 'Public Sans', sans-serif;, cursive;font-size:20px;font-weight:bolder;">{{$data->name}}</p>
                                <p class="mt-4" style="font-family: 'Public Sans', sans-serif;, cursive;font-size:15px"><?php echo date('M d, Y', strtotime($data->date)); ?></p>
                                <p class="mt-1" style="font-family: 'Public Sans', sans-serif;, cursive;font-size:15px">{{$data->location}}</p>
                                <a style="position: absolute; bottom:10px; right:10px;" href="{{url('delete-roxas-event', $data->id)}}" onclick="return confirm('Delete event?')"><i class="fa fa-trash mt-3 text-danger" style="font-size: 30px"></i></a>
                            </div>
                        @endforeach
                    </div>
                @endif


                
                
                
            </div>
            <!-- END: Content -->
        </div>
        
        
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="admin/dist/js/app.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        
        <script>
          $(document).ready(function() {
            var itemCount = $('.owl-carousel .item').length; // Get the number of items in the carousel
            var loopValue = (itemCount > 3) ? true : false; // Set loop value based on the number of items

            $('.owl-carousel').owlCarousel({
              loop: loopValue,
              autoplay: true,
              autoplayTimeout: 1000,
              autoplayHoverPause: true,
              nav: true,
              navText: ['<i class="fa fa-chevron-left text-info"></i>', '<i class="fa fa-chevron-right text-info"></i>'],
              navContainer: '.owl-carousel',
              navClass: ['owl-prev', 'owl-next'],
              responsive: {
                0: {
                  items: 1 // Show 1 item on small screens (phones)
                },
                768: {
                  items: 2 // Show 2 items on tablet screens
                },
                992: {
                  items: 3 // Show 3 items on larger screens
                }
              }
            });
          });

        </script>
          
        
        
        
        <!-- END: JS Assets-->
    </body>
</html>