<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('admin.dashboard')}}">
                    <div class="brand-logo">
                        <img style="width: 40px" src="{{asset('dashboardAssets/app-assets/images/logo/logo.png')}}">
                    </div>
                    <h2 class="brand-text mb-0">{{__('Medical-Rep')}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <hr>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{Route::is('admin.admins.index')? 'active':''}}"><a
                    href="{{route('admin.dashboard')}}"><i
                        class="feather icon-home"></i><span class="menu-title"
                                                            data-i18n="Dashboard">{{__("Main Dashboard")}}</span></a>

            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-italic"></i>
                    <span class="menu-title" data-i18n="Data List">{{__("admins")}}</span>
                </a>
                <ul class="menu-content">

                    <li class="{{ Route::is('admin.admins.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.admins.index') }}">
                            <i class="feather icon-eye"></i>
                            <span class="menu-item"
                                  data-i18n="List View">{{__("Admin List")}}</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        {{--<li class=" nav-item"><a href="#"><i class="feather icon-pocket"></i>--}}
        {{--    <span class="menu-title" data-i18n="Data List">{{__('dashboard.section_four')}}</span>--}}
        {{--</a>--}}
        {{--<ul class="menu-content">--}}
        {{--    <li class="{{Route::is('dashboard')? 'active':''}}">--}}
        {{--        <a href="{{route('dashboard')}}">--}}
        {{--            <i class="feather icon-eye"></i>--}}
        {{--            <span class="menu-item" data-i18n="List View">{{__('dashboard.show_content')}}</span>--}}
        {{--        </a>--}}
        {{--    </li>--}}
        {{--     <li class="{{Route::is('dashboard')? 'active':''}}">--}}
        {{--        <a href="{{route('dashboard')}}">--}}
        {{--            <i class="feather icon-eye"></i>--}}
        {{--            <span class="menu-item" data-i18n="List View">{{__('dashboard.show_images')}}</span>--}}
        {{--        </a>--}}
        {{--    </li>--}}
        {{--</ul>--}}
        {{--</li>--}}
    </div>
</div>
