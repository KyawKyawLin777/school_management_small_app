@include('layouts.header')

<div class="wrapper">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <div class="main-panel">
        <div class="main-header">
            <div class="main-header-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                            height="20" />
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
            @include('layouts.navigation')
        </div>

        <div class="container">
            <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Student Management</h3>
                        <ul class="breadcrumbs mb-3">
                            <li class="nav-home">
                                <a href="{{ url('dashboard') }}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="fa-solid fa-chevron-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="separator">
                                <i class="fa-solid fa-chevron-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Student Management</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->has('email'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ $errors->first('email') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->has('password'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ $errors->first('password') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Delete!</strong> {{ session('delete') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('student_attendance.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="student_name">Name</label>
                                            <input type="text" class="form-control" id="student_name"
                                                name="student_name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="grade">Grade</label>
                                            <input type="text" class="form-control" id="grade" name="grade"
                                                placeholder="Enter Grade">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="gr_number">Gr Number</label>
                                            <input type="text" class="form-control" id="gr_number" name="gr_number"
                                                placeholder="Enter GR Number">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="gr_number">Attendance</label>
                                            <select name="attendance" id="attendance" class="form-control">
                                                <option value="Present">Present</option>
                                                <option value="Absent">Absent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-primary form-control">Add
                                                Student</button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Student Attendance Table</h4>

                            </div>
                        </div>
                        <div class="card-body">



                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach ($grades as $key => $grade)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $grade->name }}</td>

                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('grade.edit', $grade->id) }}"
                                                            data-bs-toggle="tooltip" title="Edit Task"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('grade.destroy', $grade->id) }}"
                                                            method="POST" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-bs-toggle="tooltip" title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach --}}


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @include('layouts.copyright') --}}
    </div>

    {{-- @include('layouts.custom_color') --}}
</div>

@include('layouts.footer')

<script>
    $("#add-row").DataTable({
        pageLength: 5,
    });

    document.querySelectorAll('.removeRowButton').forEach(function(button) {
        button.addEventListener('click', function() {
            $('#addRowModal').modal('hide');
        });
    });
</script>
