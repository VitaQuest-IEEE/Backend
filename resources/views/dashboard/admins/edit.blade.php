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
    <div class=" content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
           <div style="margin-top: 10px">
               <x-breadcrumb now="{{__('Add User')}}">
                   <li class="breadcrumb-item"><a href="">
                           {{__('Add User')}}
                       </a></li>
               </x-breadcrumb>
           </div>
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route("admin.admins.store")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label class="w-100" for="image"> {{__('name')}}
                                            <input type="text"  class="form-control" name="name"  value="{{$user->name}}"  />
                                            @error('name')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="w-100" for="image"> {{__('email')}}
                                            <input type="text"  class="form-control" name="email"  value="{{$user->email}}"  />
                                            @error('email')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="w-100" for="image"> {{__('Password')}}
                                            <input type="password"  class="form-control" name="password"  value="{{ old('password')}}"  />
                                            @error('password')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="w-100" for="image"> {{__('Confirm Password')}}
                                            <input type="password"  class="form-control" name="confirm_password"  value="{{ old('confirm_password')}}"  />
                                            @error('confirm_password')
                                            <span style="font-size: 12px;" class="text-danger">{{$message}}</span>
                                            @enderror
                                        </label>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('Edit')}}</button>
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
