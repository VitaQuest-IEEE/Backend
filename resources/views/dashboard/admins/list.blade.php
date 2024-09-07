@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <div class="content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <x-dashboard.layouts.breadcrumb now="{{__('Admins List')}}">
                    </x-dashboard.layouts.breadcrumb>
                    <!-- Column selectors with Export Options and print table -->

                    <section id="column-selectors">
                        <div style="margin-bottom: 5px">
                            <button class="btn btn-success btn-lg py-2 px-5 ml-auto {{ app()->getLocale() == 'ar' ? 'ml-auto' : 'mr-auto' }}"
                                    onclick="window.location='{{ route('admin.admins.create') }}'">
                                {{ __('Create') }}
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title">{{__('Admins List')}}</h4>
                                    </div>
                                    @php $i=0; @endphp
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                                <thead>
                                                <tr>
                                                    <th>{{__('Number')}}</th>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Type')}}</th>
                                                    <th>{{__('Actions')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($users as $user)
                                                    <tr>
                                                        <th scope="row">{{++$i}}</th>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->type}}</td>
                                                        <td>
                                                            <a href="{{route('admin.admins.edit',$user->id)}}"
                                                               class="btn btn-primary">{{__('Edit')}}</a>
                                                            <a href="{{route('admin.admins.destroy',$user->id)}}" onclick="event.preventDefault();
                                                                document.getElementById('delete-form-{{$user->id}}').submit();"
                                                               class="btn btn-danger">{{__('Delete')}}</a>
                                                            <form id="delete-form-{{$user->id}}"
                                                                  action="{{route('admin.admins.destroy',$user->id)}}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">{{__('No Data')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            {{$users->withQueryString()->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <!-- Column selectors with Export Options and print table -->
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
@endsection
@section('content')

@endsection
@section('js')

@endsection
