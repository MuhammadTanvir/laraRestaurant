@extends('backend.layouts.master')
@section('title')
    Contact Details ~ Admin Panel
@endsection
@section('admin-content')
<div class="main-content">

             <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('admin.contact_lists') }}">All Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        @include('backend.layouts.partials.logout')
                    </div>
                </div>
            </div>
           
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                   <div class="col-lg-6 col-md-8 mt-5">
                            <div class="card card-bordered">
                                <h6>Subject: {{$contact_details->subject}}</h6>
                                <div class="card-body">

                                    <h5 class="title">Name: {{ $contact_details->name }}</h5>
                                    <h5 class="title">Phone: {{ $contact_details->phone }}</h5>
                                    <h5 class="title">Email: {{ $contact_details->email }}</h5>
                                    <p class="card-text">Message:  {{ $contact_details->message }}
                                    </p>
                                    <a href="{{ route('admin.contact_lists') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
@endsection



