<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php $user = auth()->user() @endphp
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('public/logo.png') }}" alt="{{ $basic->title }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light">{{ $basic->title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $user->image !== null ? asset("public/images/user/$user->image") : asset('public/default.png') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Courching.... </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if ($user->hasRole('customer'))
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item {{ Request::is('admin/order') ? 'menu-open' : '' }}">

                        <a href="#" class="nav-link {{ Request::is('admin/order') ? 'active' : '' }}">
                            <i class="fa fa-users" style="font-size:24px"></i>
                            <p>Order<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('order') }}"
                                    class="nav-link {{ Request::is('admin/order') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-paperclip"></i>
                                    <p>Order List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ Request::is('student/Exam/create') ? 'menu-open' : '' }}">

                        <a href="#" class="nav-link {{ Request::is('/student/Exam/create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard"></i>
                            <p>Exam Panel<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('student.exam.index') }}"
                                    class="nav-link {{ Request::is('/student/Exam/create') ? 'active' : '' }}">

                                    <i class='fas fa-graduation-cap' style='font-size:24px'></i>
                                    <p>Exam List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('student.exam.showIndex') }}"
                                    class="nav-link {{ Request::is('/student/Exam/showIndex') ? 'active' : '' }}">
                                    <i class="fas fa-poll-h" style='font-size:24px'></i>
                                    <p>Result List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            @endif
            @if ($user->hasRole('admin'))
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt" style="font-size:24px"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li
                        class="nav-item {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard" style="font-size:24px"></i>
                            <p>Manage Course<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.subject.index') }}"
                                    class="nav-link {{ Request::is('admin/get-about') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subject</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.batch.index') }}"
                                    class="nav-link {{ Request::is('admin/get-privacy') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Batch</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.course.index') }}"
                                    class="nav-link {{ Request::is('admin/get-privacy') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Course</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('package.index') }}"
                                    class="nav-link {{ Request::is('admin/package') || Request::is('admin/package/create') || Request::is('admin/package/*/edit') || Request::is('admin/package/*/show') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon" style="font-size:24px"></i>
                                    <p>Course Package </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Request::is('admin/exam/index') || Request::is('admin/mcq/index') || Request::is('admin/exam/create') || Request::is('admin/mcq/create') || Request::is('admin/mcq/index') ? 'menu-open' : '' }}">

                        <a href="#"
                            class="nav-link {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : '' }}">
                            <i class="fa fa-magic"></i>
                            <p>Manage Exam<i class="fas fa-angle-left right" style="font-size:24px"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.assign.index') }}"
                                    class="nav-link {{ Request::is('admin/exam/index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Exam Create</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="{{route('admin.moduleMcq.index')}}" class="nav-link {{Request::is('admin/get-privacy') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Module </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.module.assign.index')}}" class="nav-link {{Request::is('module/assign/index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Module Assign</p>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('admin.mcq.index') }}"
                                    class="nav-link {{ Request::is('admin/get-privacy') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MCQ Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item {{ Request::is('admin/exam/index') || Request::is('admin/mcq/index') || Request::is('admin/exam/create') || Request::is('admin/mcq/create') || Request::is('admin/mcq/index') ? 'menu-open' : '' }}">

                        <a href="#"
                            class="nav-link {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : '' }}">
                            <i class="fa fa-star" style='font-size:24px'></i> <!-- A star icon -->
                            <p>Exam Result<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.student.result.index') }}"
                                    class="nav-link {{ Request::is('/admin/student/result/list') ? 'active' : '' }}">
                                    <i class='fa fa-book-reader' style='font-size:24px'></i>
                                    <p>ALL Student </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Request::is('admin/exam/index') || Request::is('admin/mcq/index') || Request::is('admin/exam/create') || Request::is('admin/mcq/create') || Request::is('admin/mcq/index') ? 'menu-open' : '' }}">

                        <a href="#"
                            class="nav-link {{ Request::is('/admin/student/result/list') ? 'active' : '' }}">
                            <i class="fa fa-user-graduate" style="font-size:24px"></i>
                            <p>Assignment<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.assignment.index') }}"
                                    class="nav-link {{ Request::is('/admin/student/result/list') ? 'active' : '' }}">
                                    <i class='fa fa-book-reader' style='font-size:24px'></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Request::is('/admin/order/list') || Request::is('update-order-status') ? 'menu-open' : '' }}">

                        <a href="#"
                            class="nav-link {{ Request::is('/admin/order/list') || Request::is('update-order-status') ? 'active' : '' }}">
                            <i class="fa fa-users" style="font-size:24px"></i>
                            <p>Manage Order <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('admin-order-list') }}"
                                    class="nav-link {{ Request::is('/admin/order/list') || Request::is('update-order-status') || Request::is('admin/package/*/show') ? 'active' : '' }}">
                                    <i class="fas fa-tasks"></i>
                                    <p>Order List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ Request::is('/admin/payment/order/list') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : '' }}">
                            <i class="fa fa-leaf"style="font-size:24px"></i>
                            <p>Manage Payment<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin-payment-order-list') }}"
                                    class="nav-link {{ Request::is('/admin/payment/order/list') || Request::is('') || Request::is('') || Request::is('') ? 'active' : '' }}">
                                    <i class="far fa-money-bill-alt"></i>
                                    <p>Payment List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Request::is('/admin/bkash/index') || Request::is('/admin/nagad/add') || Request::is('/admin/bank/add') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : '' }}">
                            <i class="fas fa-money-check" style="font-size:24px"></i>
                            <p>Payment Gateway<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('bkash-index') }}"
                                    class="nav-link {{ Request::is('/admin/bkash/index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bkash</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nagad-create') }}"
                                    class="nav-link {{ Request::is('/admin/nagad/add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nagad</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('bank-create') }}"
                                    class="nav-link {{ Request::is('/admin/bank/add') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bank</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-coins" style="font-size:24px"></i>
                            <p>Financial<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('withdraw-index') }}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>withdraw</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('expense-category-list') }}" class="nav-link  ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('expense-index') }}" class="nav-link  ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nagad-create') }}" class="nav-link  ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Staff </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="nav-item {{ Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/roles') || Request::is('admin/roles/create') || Request::is('admin/permissions') || Request::is('admin/permissions/create') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link  {{ Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/roles') || Request::is('admin/roles/create') || Request::is('admin/permissions') || Request::is('admin/permissions/create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-secret" style="font-size:24px"></i>
                            <p>Users & Role<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                    class="nav-link {{ Request::is('admin/roles') || Request::is('admin/roles/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}"
                                    class="nav-link {{ Request::is('admin/permissions') || Request::is('admin/permissions/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li
                        class="nav-item {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/get-basic') || Request::is('admin/get-about') || Request::is('admin/get-terms') || Request::is('admin/get-privacy') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs" style="font-size:24px"></i>
                            <p>Website Setting<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('get-about') }}"
                                    class="nav-link {{ Request::is('admin/get-about') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>About</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('get-privacy') }}"
                                    class="nav-link {{ Request::is('admin/get-privacy') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Privacy</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('get-terms') }}"
                                    class="nav-link {{ Request::is('admin/get-terms') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terms & Condition</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('get-basic') }}"
                                    class="nav-link {{ Request::is('admin/get-basic') ? 'active' : '' }}">
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
