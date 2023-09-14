@extends('admin_folder/admin_sidebar')
@section('admin_content')
<head>
    <title>Admin Personels - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="admin_personel_container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="admin_personel_wrapper">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="admin_personel_wrapper_header">
                                        <p class="text-start p-2 admin_personel_wrapper_header_title"><b>Personels</b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-2">
                                <div class="col-sm-12">
                                    <div class="admin_personel_card_container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img src="images/card_icon_users.png" class="img-fluid personel_card_icon">
                                                <h3 class="text-start personel_card_text">100</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h4 class="text-center personel_card_title">Personels</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-2 ">
                                <div class="col-sm-12">
                                    <div class="add_personel_button_container">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#admin_add_personel"><img src="images/icon_button_plus.png" class="img-fluid add_new_office_icon_button">Add new Personel</button>
                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="admin_add_personel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new personel</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        


                                                            <div class="row p-2">
                                                                <div class="col-sm-12">
                                                                    <form action="/addingPersonel" method="POST">

                                                                        @csrf

                                                                        <div class="row">

                                                                            <div class="col-sm-6">
                                                                                <label class="form-label">Role Type</label>
                                                                                <select class="form-select" name="role_id">
                                                                                    <option value="2">Budget Office Personel</option>
                                                                                    <option value="3">Bids and Awards Commitee Personel</option>
                                                                                    <option value="4">Colleges and Units Personel</option>
                                                                                    <option value="5">Inchage Personel</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="col-sm-6">
                                                                                <label class="form-label">Office</label>
                                                                                <select class="form-select" name="office_id">
                                                                                    @foreach ($offices as $item_office)
                                                                                        <option value="{{$item_office->id}}">{{$item_office->office_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">First name</label>
                                                                                <input type="text" class="form-control" name="first_name">
                                                                            </div>

                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Last name</label>
                                                                                <input type="text" class="form-control" name="last_name">
                                                                            </div>

                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Middle name</label>
                                                                                <input type="text" class="form-control" name="middle_name">
                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="row">

                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Date of birth</label>
                                                                                <input type="date" class="form-control" name="date_of_birth">
                                                                            </div>

                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Sex</label>
                                                                                <select class="form-select" name="sex">
                                                                                    <option value="Male">Male</option>
                                                                                    <option value="Female">Female</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="col-sm-4">
                                                                                <label class="form-label">Phone</label>
                                                                                <input type="text" class="form-control" name="phone">
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <label class="form-label">Email</label>
                                                                                    <input type="text" class="form-control" name="email">

                                                                                    <label class="form-label">Password</label>
                                                                                    <input type="password" class="form-control" name="password">

                                                                                    <label class="form-label">Confirm Password</label>
                                                                                    <input type="password" class="form-control" name="confirm_password">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-success">Submit new personel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="admin_personels_container">
                                        <div class="admin_personels_wrapper">
                                            <table class="table">
                                                <thead>
                                                    <th>Action</th>
                                                    <th>No.#</th>
                                                    <th>Name</th>
                                                    <th>Sex</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Role Type</th>
                                                    <th>Office Type</th>
                                                    <th>Account Status</th>
                                                </thead>
                                                @foreach ($personels as $item_personels)

                                                @if ($item_personels->role_id != 1)
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#edit_personel{{$item_personels->id}}">Edit</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="edit_personel{{$item_personels->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Personel</h1>
                                                                            <button type="hidden" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="/edit-personel" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="id" class="form-control" value="{{$item_personels->id}}">
                                                                                <label class="form-label">Role Type</label>
                                                                                <select class="form-select" name="role_id" selected>
                                                                                    <option value="{{$item_personels->role_id}}">
                                                                                        @if ($item_personels->role_id == 2)
                                                                                            Budget Office Personel

                                                                                        @elseif($item_personels->role_id == 3)
                                                                                            Bids and Awards Committee Personel

                                                                                        @elseif($item_personels->role_id == 4)
                                                                                            College and Units Personel

                                                                                        @elseif($item_personels->role_id == 5)
                                                                                            Personel Incharge
                                                                                        @endif
                                                                                    </option>
                                                                                    <option value="2">Budget Office Personel</option>
                                                                                    <option value="3">Bids and Awards Committee Personel</option>
                                                                                    <option value="4">College and Units Personel</option>
                                                                                    <option value="5">Personel Incharge</option>
                                                                                </select>

                                                                                <label class="form-label">Office / Workspace / Uni</label>
                                                                                <select class="form-select" name="office_id">
                                                                                    <option value="{{$item_personels->office_id}}">{{$item_personels->office->office_name}}</option>
                                                                                    @foreach ($offices as $item_offce)
                                                                                        <option value="{{$item_offce->id}}">{{$item_offce->office_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <label class="form-label">First name</label>
                                                                                <input type="text" class="form-control" name="first_name" value="{{$item_personels->first_name}}">

                                                                                <label class="form-label">Last name</label>
                                                                                <input type="text" class="form-control" name="last_name" value="{{$item_personels->last_name}}">

                                                                                <label class="form-label">Middle name</label>
                                                                                <input type="text" class="form-control" name="middle_name" value="{{$item_personels->middle_name}}">

                                                                                <label class="form-label">Date of Birth</label>
                                                                                <input type="date" class="form-control" name="date_of_birth" value="{{$item_personels->date_of_birth}}">

                                                                                <label class="form-label">Sex</label>
                                                                                <select class="form-select" name="sex">
                                                                                    <option value="{{$item_personels->sex}}" selected>{{$item_personels->sex}}</option>
                                                                                    <option value="Male">Male</option>
                                                                                    <option value="Female">Female</option>
                                                                                </select>
                                                                                <label class="form-label">Phone</label>
                                                                                <input type="text" class="form-control" name="phone" value="{{$item_personels->phone}}">

                                                                                <label class="form-label">Email</label>
                                                                                <input type="text" class="form-control" name="email" value="{{$item_personels->email}}">

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button class="btn btn-primary">Save changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete_personel_{{ $item_personels->id }}">Delete</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete_personel_{{ $item_personels->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 class="text-center">Are you sure you want to delete {{ $item_personels->first_name . " " . $item_personels->last_name }}</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <form action="/delete-personel" method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="id" class="form-control" value="{{$item_personels->id}}">
                                                                            <button class="btn btn-danger">Confrim Delete</button>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item_personels->first_name . " " .  $item_personels->last_name}}</td>
                                                        <td>{{ $item_personels->sex}}</td>
                                                        <td>{{ $item_personels->phone}}</td>
                                                        <td>{{ $item_personels->email}}</td>
                                                        <td>
                                                            @if ($item_personels->role_id == 2)
                                                                Budget Office Personel

                                                            @elseif($item_personels->role_id == 3)
                                                                Bids and Awards Committee Personel

                                                            @elseif($item_personels->role_id == 4)
                                                                College and Units Personel

                                                            @elseif($item_personels->role_id == 5)
                                                                Personel Incharge
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $item_personels->office->office_name }}
                                                        </td>
                                                        <td>
                                                            @if ($item_personels->account_status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                                
                                                    
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