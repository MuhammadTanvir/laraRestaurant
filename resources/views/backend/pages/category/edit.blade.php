@extends('backend.layouts.master')

@section('title')
Category Create - Admin Panel
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
                <h4 class="page-title pull-left">Category Edit</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.category.index') }}">All Category</a></li>
                    <li><span>Create Category</span></li>
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
                    <h4 class="header-title">Edit Category</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <label for="name">Category Title</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Title" value="{{ $category->name }}">
                            </div>
                           

                        </div>
                     <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Category</button>
                       <a href="{{ route('admin.category.index') }}" type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Back </a> 
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