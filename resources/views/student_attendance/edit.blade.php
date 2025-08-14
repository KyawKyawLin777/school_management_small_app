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
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Student Management Edit</h3>
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
                            <a href="#">Student Management Edit</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('student_attendance.update', $attendance->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Student Management Edit</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="student_name">Name</label>
                                                <input type="text" class="form-control" id="student_name"
                                                    name="name" placeholder="Enter Name" autocomplete="off"
                                                    value="{{ $attendance->name }}" required>
                                                <input type="hidden" class="form-control" id="student_id"
                                                    name="student_id" autocomplete="off"
                                                    value="{{ $attendance->student_id }}" required>
                                                <div id="suggestions" class="list-group position-absolute w-100"
                                                    style="z-index:1000; display:none;"></div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="grade">Grade</label>
                                                <input type="text" class="form-control" id="grade_name"
                                                    name="grade_name" placeholder="Enter Grade"
                                                    value="{{ $attendance->grade ? $attendance->grade->name : '' }}"
                                                    required>
                                                <input type="hidden" class="form-control" id="grade_id"
                                                    name="grade_id" placeholder="Enter Grade"
                                                    value="{{ $attendance->grade_id }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="gr_number">Gr Number</label>
                                                <input type="text" class="form-control" id="gr_number" name="gr_no"
                                                    placeholder="Enter GR Number" value="{{ $attendance->gr_no }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="gr_number">Attendance</label>
                                                <select name="attendance" id="attendance" class="form-control">
                                                    <option value="Present"
                                                        {{ $attendance->attendance == 'Present' ? 'selected' : '' }}>
                                                        Present</option>
                                                    <option value="Absent"
                                                        {{ $attendance->attendance == 'Absent' ? 'selected' : '' }}>
                                                        Absent</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success">Update</button>
                                    <a href="{{ route('student_attendance.index') }}" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                        </form>
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
