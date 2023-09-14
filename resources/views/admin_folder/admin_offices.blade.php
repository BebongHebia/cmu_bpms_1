@extends('admin_folder/admin_sidebar')
@section('admin_content')
<head>
    <title>Admin Dashboard - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="offices_div_container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offices_div_container_header">
                            <p class="text-start p-2 offices_div_container_header_title"><b>Offices</b></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offices_div_container_content">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="office_card">
                                        <img src="images/card_icon_offices.png" class="img-fluid office_card_icon">
                                        <h3 class="text-sart office_card_text">100</h3>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="text-center office_card_subtext1">Office</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row p-3">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-success add_new_office_btn" data-bs-toggle="modal" data-bs-target="#admin_add_office"><img src="images/icon_button_plus.png" class="img-fluid add_new_office_icon_button"> Add new office</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="admin_add_office" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new office</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="admin_add_office_form_wrapper">
                                
                                                                
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="admin_add_office_form_header">
                                                                            <h5 class="text-start admin_add_office_form_header_title">Add new office</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="admin_add_office_input_forms">
                                                                            <form action="/addOffices" method="POST">
                                                                                @csrf
                                
                                                                                <div class="row">
                                
                                                                                    <div class="col-sm-6">
                                                                                        <label class="form-label">Office Type</label>
                                                                                        <select class="form-select" name="office_type">
                                                                                            <option value="GASS">GASS</option>
                                                                                            <option value="HEID">HEID</option>
                                                                                            <option value="AUXILLARY">AUXILLARY</option>
                                                                                            <option value="RESEARCH EXTENSION">RESEARCH EXTENSION</option>
                                                                                            <option value="PRODUCTION">PRODUCTION</option>
                                                                                        </select>
                                                                                    </div>
                                
                                                                                    <div class="col-sm-6">
                                                                                        <label class="form-label">Office, College, Unit Name</label>
                                                                                        <input type="text" class="form-control" name="office_name">
                                                                                    </div>
                                
                                                                                </div>
                                
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <label class="form-label">Office Description</label>
                                                                                        <div class="form-floating">
                                                                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="office_desc"></textarea>
                                                                                            <label for="floatingTextarea">Office Description</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="office_table_container">
                                        <div class="office_table_wrapper">
                                            <table class="table">
                                                <thead class="office_table_head">
                                                    <th>Action</th>
                                                    <th>No.#</th>
                                                    <th>Office Name</th>
                                                    <th>Office Type</th>
                                                    <th>Office Description</th>
                                                    <th>Office Status</th>
                                                </thead>
                                                @foreach ($offices as $item_office)
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editOffice_{{$item_office->id}}">Edit</button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editOffice_{{$item_office->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Office</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form action="/edit-office" method="post">

                                                                                @csrf

                                                                                <input type="hidden" name="id"  value="{{$item_office->id}}" class="form-control">
                                                                                
                                                                                <label class="form-label">Office Name</label>
                                                                                <input type="text" name="office_name" value="{{$item_office->office_name}}" class="form-control">

                                                                                <label class="form-label">Office Name</label>
                                                                                <select class="form-select" name="office_type">
                                                                                    <option value="{{$item_office->office_type}}">{{$item_office->office_type}}</option>

                                                                                    <option value="GASS">GASS</option>
                                                                                    <option value="HEID">HEID</option>
                                                                                    <option value="AUXILLARY">AUXILLARY</option>
                                                                                    <option value="RESEARCH EXTENSION">RESEARCH EXTENSION</option>
                                                                                    <option value="PRODUCTION">PRODUCTION</option>
                                                                                </select>

                                                                                <label class="form-label">Office Description</label>
                                                                                <textarea name="office_desc" class="form-control" cols="30" rows="5">{{$item_office->office_desc}}</textarea>
                                                                                
                                                                                <label class="form-label">Office Status</label>
                                                                                <select class="form-select" name="office_status">
                                                                                    <option value="{{$item_office->office_status}}">
                                                                                        @if ($item_office->office_status == 1)
                                                                                            Active
                                                                                        @else
                                                                                            Inactive
                                                                                        @endif
                                                                                    </option>
                                                                                    <option value="1">Active</option>
                                                                                    <option value="0">Inactive</option>
                                                                                </select>
                                                                            
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button class="btn btn-success">Save changes</button>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_offce_{{$item_office->id}}">Delete</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete_offce_{{$item_office->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Office</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="/delete-office" method="post">
                                                                                @csrf
                                                                                
                                                                                <input type="hidden" name="id"  value="{{$item_office->id}}" class="form-control">
                                                                                
                                                                                <h5 class="text-center">Are you sure you want to delete {{$item_office->office_name}}</h5>
                                                                            
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button class="btn btn-danger">Confirm Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item_office->office_name }}</td>
                                                        <td>{{ $item_office->office_type }}</td>
                                                        <td>{{ $item_office->office_desc }}</td>
                                                        <td>

                                                            @if ($item_office->office_status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif

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
            </div>
        </div>
    </div>


@endsection