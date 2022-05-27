<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Budget App') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- End fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />   <!-- core:css -->


          <!-- Bootstrap Css -->
          <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
          <!-- Icons Css -->
          <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
          <!-- App Css-->
          <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body data-layout="horizontal">
        <div id="layout-wrapper">

                <!-- Header START -->
                @include('layouts.navigation')



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                    {{ $slot }}
                </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Mugambi Alois.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://Themesdesign.com/" target="_blank" class="text-reset">Themesdesign</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


          <!-- JAVASCRIPT -->
          <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
          <script src="{{ asset('libs/metismenujs/metismenujs.min.js') }}"></script>
          <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
          <script src="{{ asset('libs/eva-icons/eva.min.js') }}"></script>
           <!-- apexcharts -->
          <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
          <script src="{{asset('js/pages/dashboard.init.js')}}"></script>
          <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
