<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}"
                                                              class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}"
                                                              class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}"
                                                              class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}"
                                                              class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

        </div>
        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown nav-item d-none d-md-flex">
                        <a href="#" class="d-flex nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
                           aria-expanded="false">
                            <span class="avatar country-flag mr-0 align-self-center bg-transparent">
                                <img src="{{ URL::asset('assets/img/flags/us_flag.jpg') }}" alt="img">
                            </span>
                            <div class="my-auto">
                                <strong class="mr-2 ml-2 my-auto">English</strong>
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-search"><circle cx="11" cy="11"
                                                                                            r="8"></circle><line x1="21"
                                                                                                                 y1="21"
                                                                                                                 x2="16.65"
                                                                                                                 y2="16.65"></line></svg>
											</button>
										</span>
                        </div>
                    </form>
                </div>

                <div class="dropdown nav-item main-header-notification">
                            @if(auth()->user())
                                <li class="dropdown dropdown-notification nav-item" id="notifications-icon"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">{{auth()->user()->unreadNotifications()->count()??''}}</span></a>
                                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                        <li class="dropdown-menu-header">
                                            <div class="dropdown-header m-0 p-2">
                                                <h3 class="white">{{auth()->user()->unreadNotifications()->count()??''}} {{__('New')}}</h3><span class="notification-title">{{__('App Notifications')}}</span>
                                            </div>
                                        </li>
                                        <li class="scrollable-container media-list">
                                            @foreach(auth()->user()->notifications as $notification)
                                                <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                                        <div class="media-body">
                                                            <h6 class="success media-heading red darken-1">{{$notification->data['title']}}</h6><small class="notification-text text-bold-700">{{$notification?->data['body']}}</small>
                                                        </div><small>
                                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">{{$notification->created_at->diffForHumans()}}</time></small>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </li>
                                        <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="{{ route('admin.notification.markAsRead') }}">{{__('read_all')}}</a></li>
                                    </ul>
                                </li>
                            @endif
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                                                                src="{{URL::asset('assets/img/faces/6.jpg')}}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt="" src="{{URL::asset('assets/img/faces/6.jpg')}}"
                                                                class=""></div>
                                <div class="m-3 my-auto ">
                                    <h6>{{auth()->user()->name}}</h6><span>{{auth()->user()->type}}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('admin.profile.edit')}}"><i class="bx bx-user-circle"></i>{{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{route('admin.logout')}}"><i
                                class="bx bx-log-out"></i> {{__('Sign Out')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
