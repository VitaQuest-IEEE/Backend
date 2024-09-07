
@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

@endsection
@section('content')
    <div class="content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <x-dashboard.layouts.breadcrumb now="{{__('Edit Profile')}}">
            </x-dashboard.layouts.breadcrumb>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Edit Personal Data')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.profile.personal.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <label class="w-100" for="name">{{__('dashboard.name')}}
                                            <input type="text" class="form-control" name="name" placeholder="{{__('dashboard.name')}}" value="{{auth()->user()->name ?? old('name')}}" />
                                            @error('name')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="w-100" for="email">{{__('dashboard.email')}}
                                            <input type="email" class="form-control" name="email" placeholder="{{__('dashboard.email')}}" value="{{ auth()->user()->email ?? old('email')}}" />
                                            @error('email')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.edit')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Edit Password')}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('admin.profile.password.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="form-group col-4">
                                        <label class="w-100" for="current_password">{{__('current password')}}
                                            <input type="password" class="form-control show_pass_profile_page" old name="current_password" placeholder="{{__('current password')}}" value="{{old('current_password')}}" />
                                            @error('current_password')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="w-100" for="password">{{__('new password')}}
                                            <input type="password" class="form-control show_pass_profile_page" name="password" placeholder="{{__('new password')}}" value="{{ old('password')}}" />
                                            @error('password')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="w-100" for="password_confirmation">{{__('password confirmation')}}
                                            <input type="password" class="form-control show_pass_profile_page" name="password_confirmation" placeholder="{{__('password confirmation')}}" value="{{ old('password_confirmation')}}" />
                                            @error('password_confirmation')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="mx-2 mb-2" style="margin-top:-10px">
                                        <label for="">
                                            {{__('show password')}}
                                            <input type="checkbox" name="test" value="show" id='show_pass_profile_page2' onchange="show_pass_profile_page_Fn2()">
                                        </label>
                                    </div>
                                    {{-- <p class=" m-2 col-12  row">    يفضل في كلمة المرور أن : تكون باللغة الانجليزية - تتكون من 8 محارف على الأقل - تحتوي  على الأقل على
                                        [حرف كبير --- حرف صغير --- رقم  --- رمز مثل # أو $ ]  </p> --}}
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('dashboard.edit')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
