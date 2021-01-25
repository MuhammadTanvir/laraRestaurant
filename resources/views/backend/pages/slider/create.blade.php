@extends('backend.layouts.master')

@section('title')
Slider Create - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Slider Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.slider.index') }}">All SLiders</a></li>
                    <li><span>Create Slider</span></li>
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
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Slider</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <label for="name">Slider Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label for="email">Slider Sub-Title</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter Slider Sub-Title">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="image">Slider Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                        </div>
                     <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Slider</button>
                       <a href="{{ route('admin.slider.index') }}" type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Back </a> 
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection