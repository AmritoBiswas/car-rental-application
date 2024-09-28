<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS --> 
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/fonts/flaticon.css')}}">
        <!-- Boxicons CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/boxicons.min.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <!-- Owl Carousel Min CSS --> 
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
        <!-- Nice Select Min CSS --> 
        <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.min.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.css')}}">
        <!-- Jquery Ui CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery-ui.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/theme-dark.css')}}">

        <script src="{{asset('js/axios.min.js')}}"></script>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}">

        <title>Rent A Car</title>
    </head>
    <body>

        <!-- PreLoader Start -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="sk-cube-area">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PreLoader End -->


        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="{{asset('/')}}" class="logo">
                    <img src="{{asset('frontend/assets/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                    <img src="{{asset('frontend/assets/img/logos/footer-logo1.png')}}" class="logo-two" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="navbar-brand" href="{{asset('/')}}">
                            <img src="{{asset('frontend/assets/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                            <img src="assets/img/logos/footer-logo1.png" class="logo-two" alt="Logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="nav-link active">
                                        Home 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('allCar')}}" class="nav-link">
                                        All Cars
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('booked')}}" class="nav-link">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('booked')}}" class="nav-link">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('booked')}}" class="nav-link">
                                        Contact
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('login')}}" class="nav-link btn btn-primary text-white p-2">
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('logout')}}" class="nav-link btn btn-danger text-dark p-2">
                                        Logout
                                    </a>
                                </li>
                              
                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->

        @yield('content')

        <!-- Footer Area -->
        <footer class="footer-area footer-bg">
            <div class="container">
                <div class="footer-top pt-100 pb-70">
                    <div class="row align-items-center">
                        All right Reserve@Car Rent 2024
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->


        <!-- Jquery Min JS -->
        <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap Bundle Min JS -->
        <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Magnific Popup Min JS -->
        <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
        <!-- Nice Select Min JS -->
        <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
        <!-- Wow Min JS -->
        <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
        <!-- Jquery Ui JS -->
        <script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
        <!-- Meanmenu JS -->
        <script src="{{asset('frontend/assets/js/meanmenu.js')}}"></script>
        <!-- Ajaxchimp Min JS -->
        <script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{asset('frontend/assets/js/form-validator.min.js')}}"></script>
        <!-- Contact Form JS -->
        <script src="{{asset('frontend/assets/js/contact-form-script.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
        
    </body>
</html>