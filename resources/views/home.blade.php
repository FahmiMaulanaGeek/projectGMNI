@extends('layouts.admin')
@section('content')
    

<body>
    <!-- Loader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
  
   <div class="container">
  
    <!-- 1st section -->
    <section class="row tm-section">
     <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
      <div class="tm-flex-center p-5 tm-bg-color-primary tm-section-min-h">
        <h1 class="tm-text-color-white tm-site-name">Magazee</h1>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
      <div class="tm-flex-center p-5">
        <q class="tm-quote tm-text-color-gray">Ut sit amet augue elit. Vivamus eget tortor in ante scelerisque gravida. Vestibulum auctor condimentum sem.</q>
      </div>
    </div>
  </section>
  
  <!-- 2nd section -->
  <section class="row tm-section tm-col-md-reverse">
   <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
    <div class="tm-flex-center p-5">
      <div class="tm-md-flex-center">
        <h2 class="tm-text-color-primary mb-4">Fusce ac enim at justo</h2>
        <p class="mb-4">Pellentesque sagittis feugiat massa, vitae blandit elit dictum in. Nam eleifend nunc dui, sed cusus justo molestie id. Vestibulum vel sagittis justo.</p>
        <a href="#" class="btn btn-primary float-lg-right tm-md-align-center">Read more</a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
    <div class="tm-flex-center p-5 tm-bg-color-primary">
      <div class="tm-max-w-400 tm-flex-center tm-flex-col">
        <img width="300px" src="assets/img/logogmni.png" alt="Image" class="rounded-circle mb-4">
        <p class="tm-text-color-white small tm-font-thin mb-0">Nullam eleifend, ipsum eu aliquet fermentum , odio urna dignissim ante, semper maximus libero nisl non nibh.</p>
      </div>
    </div>
  </div>
  </section>
@endsection
