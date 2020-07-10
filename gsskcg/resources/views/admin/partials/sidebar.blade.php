<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="users"
                                class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">{{ auth()->user()->name }}&nbsp;<i
                                        class="fa fa-angle-down"></i>
                                </h5>
                                <span class="op-5 user-email">{{ auth()->user()->email }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                    data-target="#logout-modal"><i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Logout</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="p-15 m-t-10"><a href="javascript:void(0)"
                        class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i
                            class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Create New</span> </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/admin/index" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/admin/tickets" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Tickets</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        data-toggle="collapse" data-target="#collapse-user-menu" aria-expanded="true"
                        aria-controls="collapse-user-menu"><i class="mdi mdi-border-all"></i><span
                            class="hide-menu">User</span></a>
                    <div id="collapse-user-menu" class="collapse" aria-labelledby="collapse-user-menu">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/create-user"
                            aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Create
                                User</span></a>
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/manage-users"
                            aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Manage
                                Users</span></a>
                    </div>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        data-toggle="collapse" data-target="#collapse-role-menu" aria-expanded="true"
                        aria-controls="collapse-role-menu"><i class="mdi mdi-border-all"></i><span
                            class="hide-menu">Role</span></a>
                    <div id="collapse-role-menu" class="collapse" aria-labelledby="collapse-role-menu">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                                class="mdi mdi-face"></i><span class="hide-menu">Create
                                Role</span></a>
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                                class="mdi mdi-face"></i><span class="hide-menu">Manage
                                Roles</span></a>
                    </div>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        data-toggle="collapse" data-target="#collapse-ticket-status-menu" aria-expanded="true"
                        aria-controls="collapse-role-menu"><i class="mdi mdi-border-all"></i><span
                            class="hide-menu">Ticket Status</span></a>
                    <div id="collapse-ticket-status-menu" class="collapse"
                        aria-labelledby="collapse-ticket-status-menu">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                                class="mdi mdi-face"></i><span class="hide-menu">Create
                                Status</span></a>
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                                class="mdi mdi-face"></i><span class="hide-menu">Manage
                                Statuses</span></a>
                    </div>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="icon-material.html" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Icon</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="starter-kit.html" aria-expanded="false"><i class="mdi mdi-file"></i><span
                            class="hide-menu">Blank</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="error-404.html" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span
                            class="hide-menu">404</span></a></li>
                <li class="text-center p-40 upgrade-btn">
                    <a href="https://wrappixel.com/templates/xtremeadmin/" class="btn btn-block btn-danger text-white"
                        target="_blank">Upgrade to Pro</a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>