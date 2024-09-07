<head>
    <?php
        $lang= app()->getLocale()== 'ar' ? 'ar' : 'en';
        ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="true">
    <meta name="keywords" content="true">
    <meta name="author" content="true">
    <meta name="_token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('dashboardAssets/app-assets/images/logo/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboardAssets/app-assets/images/logo/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboardAssets/app-assets/vendors/css/extensions/swiper.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/bootstrap.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/bootstrap.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/bootstrap-extended.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/bootstrap-extended.css')}}">
    @endif

    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('/dashboardAssets/app-assets/css-rtl/colors.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('/dashboardAssets/app-assets/css/colors.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/components.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/components.css')}}">
    @endif

    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/themes/dark-layout.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/themes/dark-layout.css')}}">
    @endif

    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/themes/semi-dark-layout.css')}}">
    @endif


    <!-- BEGIN: Page CSS-->
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/themes/dark-layout.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/themes/dark-layout.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/core/colors/palette-gradient.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/pages/dashboard-analytics.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/pages/dashboard-analytics.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/pages/card-analytics.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/pages/card-analytics.css')}}">
    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/plugins/tour/tour.css')}}">

    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/plugins/tour/tour.css')}}">

    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/pages/app-user.css')}}">

    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/pages/app-user.css')}}">

    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css-rtl/pages/app-ecommerce-details.css')}}">
    @else
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboardAssets/app-assets/css/pages/app-ecommerce-details.css')}}">
    @endif



    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css-rtl/custom-rtl.css')}}">

    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/custom-rtl.css')}}">

    @endif
    @if($lang=='ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/assets/css/style-rtl.css')}}">

    @else
        <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/assets/css/style.css')}}">

    @endif
    <link rel="stylesheet" type="text/css" href="{{asset('dashboardAssets/app-assets/css/iziToast.min.css')}}">
    <!-- END: Custom CSS-->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboardAssets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboardAssets/app-assets/css/pickers/pickadate/pickadate.css')}}">

    @yield('styles')
</head>
