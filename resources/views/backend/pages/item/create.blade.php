@extends('backend.layouts.master')

@section('title')
Item Create - Admin Panel
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
                <h4 class="page-title pull-left">Item Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.item.index') }}">All Items</a></li>
                    <li><span>Create Item</span></li>
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
                    <h4 class="header-title">Create New Item</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.item.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 col-sm-12">
                                <label for="name">Item Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Item Title">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="category">Category</label>
                                <select name="category_id" id="category" class="form-control select2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="name">Item Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter Item Price">
                            </div>
                        
                            <div class="col-md-12 col-sm-12">
                                <label for="image">Item Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" cols="10" rows="5"></textarea>
                            </div>

                        </div>
                     <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Item</button>
                       <a href="{{ route('admin.item.index') }}" type="submit" class="btn btn-danger mt-4 pr-4 pl-4">Back </a> 
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