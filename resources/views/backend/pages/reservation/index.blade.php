@extends('backend.layouts.master')
@section('title')
    Reservation List ~ Admin Panel
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
                                <li><a href="{{ route('admin.category.index') }}">All Reservations</a></li>
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

                                <h4 class="header-title">Reservation List</h4>
                                
                                <div class="clearfix"></div>
                                <div class="data-tables">

                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                             <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date & Time</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>  
                                                
                                        </thead>
                                        <tbody>
                                            @foreach ($reservations as $reservation)
                                               <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $reservation->name }}</td>
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->phone }}</td>
                                                <td>{{ $reservation->date_time }}</td>
                                                <td>{{ $reservation->message }}</td>
                                                <td>
                                                @if ($reservation->status=='Active')
                                                    <span class="badge badge-primary">Confirmed</span>
                                                @else
                                                    <span class="badge badge-danger">Not Conformed</span>
                                                @endif
                                                </td>
                                               
                                                <td>
                                                {{-- <a class="btn btn-success text-white" href="">Edit</a> --}}
                                                 @if ($reservation->status=='Inactive')
                                                     <button style="display: inline" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteUserModal{{ $reservation->id }}"> Confirm
                                                </button>
                                                @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                    @foreach ($reservations as $reservation)
                                    <div class="modal fade" id="deleteUserModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Are you sure to Conform ?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form method="POST" action="{{ route('admin.reservation.status', $reservation->id) }}" style="display: inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary ml-2">
                                                        Confirm
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



