@extends('college_folder/college_sidebar')
@section('college_content')
<head>
    <title> College Departments - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="college_departments_page">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="college_departments_header">
                            <p class="text-start p-1"><b>My Departments</b></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 p-2">
                        <div class="college_departments_action_warpper">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create_departments_modal"><img src="images/icon_button_plus.png" class="img-fluid add_icon">Add new Departments</button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="create_departments_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Department</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/create-my-departments" method="post">
                                                @csrf

                                                <input type="text" value="{{auth()->user()->office->office_name}}" class="form-control" readonly>
                                                <input type="hidden" value="{{ auth()->user()->office->id }}" class="form-control" name="office_id">

                                                <label class="form-label">Department Name</label>
                                                <input type="text" name="dept_name" class="form-control">

                                                <label class="form-label">Department Description</label>
                                                <div class="form-floating">
                                                    <textarea name="dept_description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Description</label>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-success">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="college_departments_page_department_table_wrapper">
                            <div class="college_departments_page_department_table_container">
                                
                                <table class="table">
                                    <thead>
                                        <th>No.#</th>
                                        <th>Department Name</th>
                                        <th>Department Status</th>
                                        <th>Action</th>
                                    </thead>

                                    @foreach ($departments as $item_departments)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item_departments->dept_name }}</td>
                                            <td>
                                                @if ($item_departments->dept_status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>
                                                <button class="btn btn-primary">Edit</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection