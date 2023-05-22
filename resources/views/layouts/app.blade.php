<!doctype html>
<html class="no-js " lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>
        @if(trim($__env->yieldContent('page-title')))
            @yield('page-title') -
        @endif
        {{ config('app.name', 'PupRing') }}
      </title>
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('/admin/css/luno.style.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/admin/css/dataTables.min.css') }}">
      @stack('stylesheets')
   </head>
   <body class="layout-1" data-luno="theme-blue">
      <!-- start: sidebar -->
        @include('layouts.admin.sidebar')
      <!-- start: body area -->
      <div class="wrapper">
         <!-- start: page header -->
         @include('layouts.admin.header')
         <!-- start: page toolbar -->
         <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">
                @yield('page-toolbar')
                <div class="row">
                    @yield('page-content')
                </div>
            </div>
         </div>
         <!-- start: page body -->
         <!-- start: page footer -->
         @include('layouts.admin.footer')
      </div>
      <!-- Jquery Core Js -->
      <script src="{{ asset('/admin/bundles/libscripts.bundle.js') }}"></script>
      <script src="{{ asset('/admin/bundles/dataTables.bundle.js') }}"></script>
      <script src="{{ asset("admin/bundles/sweetalert2.bundle.js") }}"></script>
      <script src="{{ asset('/admin/bundles/toastr.min.js') }}"></script>
      @stack('scripts')
      @if(Session::has('success'))
      <script>
          toastr.success("{{__('Success') }}", "{!! session('success') !!}", 'success');
      </script>
    @endif
    @if(Session::has('error'))
      <script>
          toastr.error("{{__('Error') }}", "{!! session('error') !!}", 'error');
      </script>
    @endif
   </body>
</html>
