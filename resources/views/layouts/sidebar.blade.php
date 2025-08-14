<style>
    .logo {
        color: white !important;
        display: block;
        mix-blend-mode: difference;
    }
</style>
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo text-white mt-3"
                style="font-weight: bold; display: block; margin: 0 auto; text-align: center;">
                School Management
            </a>

            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}">
                        <i class="fas fa-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('subject') ? 'active' : '' }}">
                    <a href="{{ route('subject.index') }}">
                        <i class="fa-solid fa-book"></i>
                        <p>Subject</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('grade') ? 'active' : '' }}">
                    <a href="{{ route('grade.index') }}">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <p>Grade</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                    <a href="{{ url('user') }}">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <p>Teacher</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.index') }}">
                        <i class="fa-solid fa-user-graduate"></i>
                        <p>Student</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student_attendance.index') }}">
                        <i class="fa-solid fa-clipboard-user"></i>
                        <p>Student Management</p>
                    </a>
                </li>
                {{-- Dropdown --}}
                {{-- <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fa-regular fa-user"></i>
                        <p>User</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../demo1/index.html">
                                    <span class="sub-item">User Type</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>

        </div>
    </div>
</div>
