<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper" style="padding: 15px 30px;"><a href="{{ url('/dashboard') }}">Logo</a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper" style="padding: 15px 30px;"><a href="{{ url('/dashboard') }}">Logo</a></div>
        {{-- <div class="logo-wrapper" style="padding: 15px 30px;"><a href="{{ url('/dashboard') }}"><img class="img-fluid for-light" src="{{ asset('assets/logo/logo-black.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/logo/logo-white.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper" style="padding: 15px 30px;"><a href="{{ url('/dashboard') }}"><img class="img-fluid" src="{{ asset('assets/logo/fav.png') }}" alt=""></a></div> --}}
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ url('/dashboard') }}">
                            <img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt="">
                        </a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{Request::is('dashboard','admin-dashboard') ? 'active':''}}" href="{{ url('/dashboard') }}">
                            <i data-feather="home"> </i><span>Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{Request::is('sample','sample.create') ? 'active':''}}" href="{{route('sample.index')}}">
                            <i data-feather="home"> </i><span>Sample</span>
                        </a>
                    </li> -->
                    @if(Auth::user()->role_as == 'Admin')
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Settings</h6>
                            {{-- <p>API & Slides </p> --}}
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{Request::is('manage-employees','edit-employee*','add-employee') ? 'active':''}}" href="{{ url('/manage-employees') }}">
                            <i data-feather="users"></i>
                            <span>Manage Employees</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{Request::is('sample','sample.create') ? 'active':''}}" href="{{route('sample.index')}}">
                            <i data-feather="users"></i>
                            <span>Manage Samples</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{Request::is('orders','orders.create') ? 'active':''}}" href="{{route('order.index')}}">
                            <i data-feather="users"></i>
                            <span>Manage Orders</span>
                        </a>
                    </li>
                    @endif


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
