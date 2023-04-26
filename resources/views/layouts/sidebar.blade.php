<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{auth()->user()->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('admins.edit' , auth()->user()->id)}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>


    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Accounts
                        <i class="fas fa-angle-left right"></i>
{{--                        <span class="badge badge-info right"></span>--}}
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admins.index')}}" class="nav-link">
                            <i class="fas fa-user-shield nav-icon"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('doctors.index')}}" class="nav-link">
                            <i class="fas fa-user-md nav-icon"></i>
                            <p>Doctors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{route('specialities.index')}}" class="nav-link">
                    <i class="fas fa-stethoscope nav-icon"></i>
                    <p>Available Specialities</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('clinics.index')}}" class="nav-link">
                    <i class="fas fa-clinic-medical nav-icon"></i>
                    <p>Clinics</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('reservations.index')}}" class="nav-link">
                    <i class="fas fa-calendar-check nav-icon"></i>
                    <p>Clinics Reservations</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('review.index')}}" class="nav-link">
                    <i class="fas fa-comments nav-icon"></i>
                    <p>Clinics Reviews</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="fas fa-bars nav-icon"></i>
                    <p>Exercises Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('exercise.index')}}" class="nav-link">
                    <i class="fas fa-dumbbell nav-icon"></i>
                    <p>Exercises</p>
                </a>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
</aside>
