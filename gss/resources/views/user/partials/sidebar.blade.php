<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/index">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GSS
            <sup>{{ auth()->user()->roles->first()->name }}</sup>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    @if(auth()->user()->can('view-dashboard'))
    <li class="nav-item active">
        <a class="nav-link" href="/index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @if(auth()->user()->can('view-tickets') || auth()->user()->can('create-tikcet')))
    <div class="sidebar-heading">
        Interface
    </div>
    @endif

    <!-- Nav Item - Tables -->
    @if(auth()->user()->can('manage-tickets'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tickets') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tickets</span></a>
    </li>
     @endif

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tickets</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Choose Ticket Nature :</h6>
                <a class="collapse-item" href="">Active</a>
                <a class="collapse-item" href="cards.html">Closed</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Utilities Collapse Menu -->

    @if(auth()->user()->can('create-ticket'))
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Request</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Choose Request Type :</h6>
                    <a class="collapse-item" href="{{ route('service') }}">Services</a>

                    
                    <!-- <a class="collapse-item" href="{{ route('consumable') }}">Consumables</a>
                    <a class="collapse-item" href="{{ route('capital-equipment') }}">Capital Equipments</a> -->

                    
                    <a class="collapse-item" href="{{ route('hall-booking') }}">Hall Bookings</a>
                </div>
            </div>
        </li>
    @endif

<!-- Divider -->
@if(auth()->user()->can('manage-roles') || auth()->user()->can('manage-permissions') || auth()->user()->can('manage-users'))
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>
    @endif
    <li class="nav-item">
        @if(auth()->user()->can('manage-roles'))
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true"
           aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Roles</span>
        </a>
        <div id="collapseRoles" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Roles :</h6>
                <a class="collapse-item" href="/create-role">Create Role</a>
                <a class="collapse-item" href="/manage-roles">Manage Roles</a>
            </div>
        </div>
        @endif

        @if(auth()->user()->can('manage-permissions'))
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermissions"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Permissions</span>
        </a>
        <div id="collapsePermissions" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Permissions :</h6>
                <a class="collapse-item" href="/create-permission">Create Permission</a>
                <a class="collapse-item" href="/manage-permissions">Manage Permissions</a>
            </div>
        </div>
        @endif
        @if(auth()->user()->can('manage-users'))
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="collapseUsers"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users :</h6>
                <a class="collapse-item" href="/create-user">Create User</a>
                
                    <a class="collapse-item" href="/manage-users">Manage Users</a>
                
            </div>
        </div>
        @endif
    </li>

    <!-- Divider -->
    @if(auth()->user()->roles->first()->name == 'Admin')
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        
            <a class="nav-link" href="/intellisense">
                <i class="fas fa-fw fa-robot"></i>
                <span>Intellisense</span></a>
        
    </li>
    @endif

    <!-- Feedback -->

    @if(auth()->user()->roles->first()->name == 'Faculty')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ticket-feedback') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Feedback</span></a>
        </li>
    @endif

    @if(auth()->user()->roles->first()->name == 'Admin')
        <!-- User Feedback -->
            <li class="nav-item">
                <a class="nav-link" href="/feedbacks">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> Feedbacks</span></a>
            </li>
    @endif

<!-- Nav Item - Charts -->
@if(auth()->user()->can('analyse-statistics'))
    <li class="nav-item">
        <a class="nav-link" href="/analysis">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Analysis</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/statistics">
            <i class="fas fa-fw fa-table"></i>
            <span>Statistics</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
