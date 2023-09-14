<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admi - Add new personel</title>
    <link rel="stylesheet" href="styles/admin_add_personel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_add_personel_container">
                    <div class="row">

                        <div class="col-sm-4 mt-2">
                            <center>
                                <img src="images/logo.png" class="img-fluid admin_add_personel_form_logos">
                            </center>
                        </div>

                        <div class="col-sm-4 mt-2">
                            <h5 class="text-center">Adding new personel</h5>
                            <p class="text-center"><b>Central Mindanao University Budget and Procurement Monitoring System</b><br> <b></b>Musuan, Maramag <br> Bukidnon, 8709</p>
                        </div>

                        <div class="col-sm-4 mt-2">
                            <center>
                                <img src="images/cmu_logo.png" class="img-fluid admin_add_personel_form_logos">
                            </center>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form_header">
                                <h5 class="text-start form_header_title">Add new personels</h5>
                            </div>
                        </div>
                    </div>

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

                                            <div class="d-grid gap-2 mt-3">
                                                <button class="btn btn-success">Submit new personel</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
@include('sweetalert::alert')