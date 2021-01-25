@extends('backend.layouts.master')
@section('title')
    Item List ~ Admin Panel
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
                                <li><a href="{{ route('admin.item.index') }}">All Items</a></li>
                                <li><span>Item List</span></li>
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
                                
                                @include('backend.layouts.partials.messages')

                                <h4 class="header-title">Item List</h4>
                                <p class="float-right mb-2">
                                    <a class="btn btn-primary text-white" href="{{ route('admin.item.create') }}">Create New Item</a>
                                </p>
                                <div class="clearfix"></div>
                                <div class="data-tables">

                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                             <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>  
                                                
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                               <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->category->id }}</td>
                                                <td><a class="img-thumbnail img-responsive" href="{{ asset('uploads/item/'. $item->image)}}" target="_blank">
                                                    <img src="{{ asset('uploads/item/'. $item->image)}}" style="width: 50px" alt=""></a></td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</td>
                                               
                                                <td>
                                                <a class="btn btn-success text-white" href="{{ route('admin.item.edit', $item->id) }}">Edit</a>

                                                     <button style="display: inline" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteUserModal{{ $item->id }}"> Delete
                                                </button>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                    @foreach ($items as $item)
                                    <div class="modal fade" id="deleteUserModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Are you sure to delete ?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form method="POST" action="{{ route('admin.item.destroy', $item->id) }}" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger ml-2">
                                                        Confirm, Delete
                                                    </button>
                                                    <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endsection



