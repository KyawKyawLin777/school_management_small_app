@include('layouts.header')
<style>
    .suggestion-item {
        padding: 8px;
        cursor: pointer;
        background: #fff;
        border: 1px solid #ddd;
    }

    .suggestion-item:hover {
        background: #f0f0f0;
    }
</style>
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
                                            <input type="text" class="form-control" id="student_name" name="name"
                                                placeholder="Enter Name" autocomplete="off" required>
                                            <input type="hidden" class="form-control" id="student_id" name="student_id"
                                                autocomplete="off" required>
                                            <div id="suggestions" class="list-group position-absolute w-100"
                                                style="z-index:1000; display:none;"></div>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="grade">Grade</label>
                                            <input type="text" class="form-control" id="grade_name" name="grade_name"
                                                placeholder="Enter Grade" required>
                                            <input type="hidden" class="form-control" id="grade_id" name="grade_id"
                                                placeholder="Enter Grade" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="gr_number">Gr Number</label>
                                            <input type="text" class="form-control" id="gr_number" name="gr_no"
                                                placeholder="Enter GR Number" required>
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
                                <h4 class="card-title">Student Management Table</h4>

                            </div>
                        </div>
                        <div class="card-body">



                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Grade</th>
                                            <th>Gr Number</th>
                                            <th>Attendance</th>
                                            <th>History</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($attendances as $key => $attendance)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $attendance->name }}</td>
                                                <td>{{ $attendance->grade ? $attendance->grade->name : '' }}</td>
                                                <td>{{ $attendance->gr_no }}</td>
                                                <td>
                                                    @if ($attendance->attendance == 'Present')
                                                        <span class="badge badge-success fw-bold">Marked :
                                                            Present</span>
                                                    @else
                                                        <span class="badge badge-danger fw-bold">Marked :
                                                            Absent</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('attendance_history', $attendance->student_id) }}"
                                                        class="btn btn-primary">View</a>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('student_attendance.edit', $attendance->id) }}"
                                                            data-bs-toggle="tooltip" title="Edit Task"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('student_attendance.destroy', $attendance->id) }}"
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
                                        @endforeach


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

    $(document).ready(function() {
        // Suggestion dropdown
        $('#student_name').on('keyup', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('get.attendance') }}",
                type: "GET",
                data: {
                    name: query
                },
                success: function(data) {
                    let suggestionBox = $('#suggestions');
                    suggestionBox.empty();

                    if (data.length > 0) {
                        $.each(data, function(index, student) {
                            suggestionBox.append(
                                `<div class="suggestion-item"
                                    data-name="${student.name}"
                                    data-grade_id="${student.grade_id}"
                                    data-gr_number="${student.gr_no}"
                                    data-grade_name="${student.grade ? student.grade.name : ''}"
                                    data-student_id="${student.id}">
                                    ${student.name}
                                </div>`
                            );
                        });
                        suggestionBox.show();
                    } else {
                        suggestionBox.hide();
                    }
                }
            });

        });

        // When clicking a suggestion
        $(document).on('click', '.suggestion-item', function() {
            let name = $(this).data('name');
            let grade_id = $(this).data('grade_id');
            let grade_name = $(this).data('grade_name');
            let gr_number = $(this).data('gr_number');
            let student_id = $(this).data('student_id');

            $('#student_name').val(name);
            $('#grade_id').val(grade_id);
            $('#grade_name').val(grade_name);
            $('#gr_number').val(gr_number);
            $('#student_id').val(student_id);

            $('#suggestions').hide();
        });
    });
</script>
