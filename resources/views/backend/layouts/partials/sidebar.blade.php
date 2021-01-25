 <!-- sidebar menu area start -->
 @php
     // $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>

                  
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Sliders
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.slider.create') || Route::is('admin.slider.index') || Route::is('admin.slider.edit') || Route::is('admin.slider.show') ? 'in' : '' }}">
                            
                                <li class="{{ Route::is('admin.slider.index')  || Route::is('admin.slider.edit') ? 'active' : '' }}"><a href="{{ route('admin.slider.index') }}">All Slider</a></li>

                                <li class="{{ Route::is('admin.slider.create')  ? 'active' : '' }}"><a href="{{ route('admin.slider.create') }}">Create Slider</a></li>
                        
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Category
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.category.create') || Route::is('admin.category.index') || Route::is('admin.category.edit') || Route::is('admin.category.show') ? 'in' : '' }}">
                            
                                <li class="{{ Route::is('admin.category.index')  || Route::is('admin.category.edit') ? 'active' : '' }}"><a href="{{ route('admin.category.index') }}">All Category</a></li>

                                <li class="{{ Route::is('admin.category.create')  ? 'active' : '' }}"><a href="{{ route('admin.category.create') }}">Create Category</a></li>
                        
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Item
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.item.create') || Route::is('admin.item.index') || Route::is('admin.item.edit') || Route::is('admin.item.show') ? 'in' : '' }}">
                            
                                <li class="{{ Route::is('admin.item.index')  || Route::is('admin.item.edit') ? 'active' : '' }}"><a href="{{ route('admin.item.index') }}">All Item</a></li>

                                <li class="{{ Route::is('admin.item.create')  ? 'active' : '' }}"><a href="{{ route('admin.item.create') }}">Create Item</a></li>
                        
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Reservations
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.reservations.index') || Route::is('admin.reservations.edit') || Route::is('admin.reservations.show') ? 'in' : '' }}">
                            
                                <li class="{{ Route::is('admin.reservations.index')  || Route::is('admin.reservations.edit') ? 'active' : '' }}"><a href="{{ route('admin.reservations.index') }}">Reservations</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Contact
                        </span></a>
                        <ul class="collapse">
                            
                                <li class="{{ Route::is('admin.contact_lists') ? 'active' : '' }}"><a href="{{ route('admin.contact_lists') }}">Contact Lists</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->