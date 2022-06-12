<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GMNI</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/logogmni.PNG')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

        


       
    </head>
    <style>
        .dropbtn {
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          color: #8B0000;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }
        
        .dropdown-content a:hover {background-color: #ddd;}
        
        .dropdown:hover .dropdown-content {display: block;}
        
        .dropdown:hover .dropbtn {background-color: #8B0000;}
        </style>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav" style="background-color: #8B0000;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home'); }}"><img src="{{asset('assets/img/logogmni.PNG')}}" style=" height: 60px;">GMNI</a>
                
                <button class="navbar-toggler text-uppercase font-weight-bold bg-secondary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('tentang') }}">Tentang GMNI</a></li>
                        @if (\Auth::user())
                        @if (\Auth::user()->role === "admin")
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('admin-home-showLibrary') }}">Library</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('admin-accAdministration'); }}">Administrasi</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('admin-showDatabase'); }}">Database</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('adminExplore'); }}">Explore</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('adminSchedule'); }}">Schedule</a></li>
                        
                        @elseif(\Auth::user()->role === "ketua")
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('ketua-home-showLibrary') }}">Library</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('ketua-showAdministration'); }}">Administrasi</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('ketua-showDatabase'); }}">Database</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('ketuaExplore'); }}">Explore</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('showScheduleKetua'); }}">Schedule</a></li>
                            @elseif(\Auth::user()->role === "kader")
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('kader-home-showLibrary') }}">Library</a></li>
                            {{-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('administrasi'); }}">Administrasi</a></li> --}}
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('kader-showDatabase'); }}">Database</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('kaderExplore'); }}">Explore</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('kader-showSchedule'); }}">Schedule</a></li>
                        @endif
                        
                        <div class="dropdown">
                            
                            @if (\Auth::user()->role === "admin")
                            <li class="nav-item mx-0 mx-lg-1"><a class="dropbtn nav-link py-3 px-0 px-lg-3 rounded" href="{{route('isAdmin')}}">{{Auth::user()->username}}</a></li>
                            @elseif(\Auth::user()->role === "ketua")
                            <li class="nav-item mx-0 mx-lg-1"><a class="dropbtn nav-link py-3 px-0 px-lg-3 rounded" href="{{route('isKetua')}}">{{Auth::user()->username}}</a></li>
                            @elseif(\Auth::user()->role === "kader")
                            <li class="nav-item mx-0 mx-lg-1"><a class="dropbtn nav-link py-3 px-0 px-lg-3 rounded" href="{{route('isKader')}}">{{Auth::user()->username}}</a></li>                           
                            @endif
                            <div class="dropdown-content">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout </a> 
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            
                        </div>
                        @else
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ url('login'); }}">Login</a></li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        {{-- <header class="masthead bg-primary text-white text-center" style="background-repeat: no-repeat; background-image: url('{{asset('assets/img/headergmni.jpg')}}'); background-size: cover; background-position: top right; width: 100%; height: 30%; opacity: 1; visibility: inherit; z-index: 20;"> --}}
        
        <body>
        </div>  
        <section class="page-section portfolio" id="portfolio">
            <div class="container"style="position: relative; top:50px;">
                <!-- ISI KONTAINER -->
                @yield("content")
                
            </div>
                
        </section>    
        </body>
       
        <!-- Footer--> 
        <footer class="footer text-center" style="background-color: #B22222;">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            Jl Semolowaru Tengah no IX
                            <br />
                            Telp. 0878909876543
                            <br />
                            Email : gmni.indonesia@gmail.com
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Around the Web</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Freelancer</h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Portfolio Modals-->
               
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
    </body>
</html>
