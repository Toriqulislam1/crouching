<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php $user = auth()->user() @endphp
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('public/logo.png')}}" alt="{{$basic->title}}" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">{{$basic->title}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{$user->image !== null ? asset("public/images/user/$user->image") : asset('public/default.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Courching.... </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if($user->hasRole('customer'))
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order')}}" class="nav-link {{Request::is('admin/order') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>Order</p>
                    </a>
                </li>
            </ul>
            @endif
            @if($user->hasRole('admin'))
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : ''}}">
                      <i class="nav-icon fas fa-chalkboard"></i>
                        <p>Manage Course<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.subject.index')}}" class="nav-link {{Request::is('admin/get-about') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.batch.index')}}" class="nav-link {{Request::is('admin/get-privacy') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Batch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.course.index')}}" class="nav-link {{Request::is('admin/get-privacy') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Course</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('package.index')}}" class="nav-link {{Request::is('admin/package') || Request::is('admin/package/create') || Request::is('admin/package/*/edit') || Request::is('admin/package/*/show') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Course Package </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : ''}}">
                        <i class="fa fa-magic"></i>
                        <p>Manage Exam<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.assign.index')}}" class="nav-link {{Request::is('admin/get-about') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exam Assign</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.assign.index')}}" class="nav-link {{Request::is('admin/get-privacy') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exam List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin-order-list')}}" class="nav-link {{Request::is('/admin/order/list') || Request::is('update-order-status') || Request::is('admin/package/*/show') ? 'active' : ''}}">
                        <i class="fas fa-tasks"></i>
                        <p>Manage Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin-payment-order-list')}}" class="nav-link {{Request::is('/admin/payment/order/list') || Request::is('') || Request::is('') || Request::is('') ? 'active' : ''}}">
                        <i class="far fa-money-bill-alt"></i>

                        <p>Payment Manage Order</p>
                    </a>
                </li>

                <li class="nav-item {{Request::is('/admin/bkash/index') || Request::is('/admin/nagad/add') || Request::is('/admin/bank/add') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : ''}}">
                        <i class="fas fa-money-check"></i>
                        <p>Payment Gateway Add<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('bkash-index')}}" class="nav-link {{Request::is('/admin/bkash/index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bkash</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('nagad-create')}}" class="nav-link {{Request::is('/admin/nagad/add') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nagad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('bank-create')}}" class="nav-link {{Request::is('/admin/bank/add') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-coins"></i>
                        <p>Financial Statements<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('withdraw-index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>withdraw</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('expense-category-list')}}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('expense-index')}}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Expense </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('nagad-create')}}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/roles') || Request::is('admin/roles/create') || Request::is('admin/permissions') || Request::is('admin/permissions/create') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link  {{Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/roles') || Request::is('admin/roles/create') || Request::is('admin/permissions') || Request::is('admin/permissions/create') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>Users & Role<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link {{Request::is('admin/roles') || Request::is('admin/roles/create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('permissions.index')}}" class="nav-link {{Request::is('admin/permissions') || Request::is('admin/permissions/create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link {{Request::is('admin/users') || Request::is('admin/users/create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Website Setting<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('get-about')}}" class="nav-link {{Request::is('admin/get-about') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-privacy')}}" class="nav-link {{Request::is('admin/get-privacy') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Privacy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-terms')}}" class="nav-link {{Request::is('admin/get-terms') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terms & Condition</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('get-basic')}}" class="nav-link {{Request::is('admin/get-basic') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Basic Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            @endif

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
