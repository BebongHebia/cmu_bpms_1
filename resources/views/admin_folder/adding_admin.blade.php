@extends('layout')
@section('master_layout')
    
    <head>
        <title>
            Adding Admin Account
        </title>
        <link rel="stylesheet" href="styles/adding_admin.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="adding_admin_account_container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="adding_admin_account_logos_container">
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <center>
                                                <img src="images/logo.png" class="img-fluid adding_admin_account_logos_container_logo">
                                            </center>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="text-center"><b>Adding new admin account From</b></h5>
                                            <p class="text-center">Central Mindanao University <br> Maramag, Bukidnon</p>
                                        </div>

                                        <div class="col-sm-4">
                                            <center>
                                                <img src="images/cmu_logo.png" class="img-fluid adding_admin_account_logos_container_logo">
                                            </center>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="adding_admin_account_container_header">
                                    <h4 class="text-start adding_admin_account_container_title">Adding new admin account</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="adding_admin_account_field_container">
                                    <form action="/addAdmin" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5 class="text-start">Personal Info</h5>
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
                                                <label class="form-label">Date of Birth</label>
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
                                                <label class="form-label">Phone No.#</label>
                                                <input type="text" class="form-control" name="phone">
                                            </div>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-sm-12">
                                                <h5 class="text-start">Account Info</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email">
                                                
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password">

                                                <label class="form-label">Confirm password</label>
                                                <input type="password" class="form-control" name="confirm_password">
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 mt-3">
                                            <button class="btn btn-success">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection