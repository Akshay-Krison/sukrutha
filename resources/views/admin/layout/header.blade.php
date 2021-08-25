<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            
           
            
            <div class="sidebar-menu">
                <ul>
                   
                    <li class="sidebar-dropdown">
                        <a href="javascript:;"><i class="far fa-user"></i><span>Users</span></a>
                        <div class="sidebar-submenu">
                             <ul>
                                <li><a href="{{ route('user') }}">User</a></li>
                                <li><a href="{{ route('department') }}">Department</a></li>
                                <li><a href="{{ route('designation') }}">Designation</a></li>
                            </ul>
                        </div>
                    </li>
                   
                   
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
       
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">