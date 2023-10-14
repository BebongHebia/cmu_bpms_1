@extends('layout')
@section('master_layout')
    <head>
        <link rel="stylesheet" href="styles/bo_style/bo.css">
    </head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bo_page">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="side_bar_container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="side_bar_container_header">
                                            <h5 class="text-center p-3 side_bar_container_role_title">Budget Office Incharge</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="side_bar_container_profile_container">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <center>
                                                        <img src="images/profile.png" class="img-fluid admin_sidebar_profile_icon">
                                                        <h5 class="text-center admin_sidebar_profile_name">{{ auth()->user()->first_name . " " . auth()->user()->last_name}}</h5>
                                                        <p class="text-center admin_sidebar_profile_email">{{ auth()->user()->email }}</p>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="sidebar_menu_container">
                                            <div clas="row">
                                                <div class="col-sm-12">
                                                    <ul class="sidebar_menu">
                                                        <a href="/budget-office-dashboard" class="links"><li class="list"><img src="images/dashboard_icon.png" class="img-fluid sidebar_menu_icons"> Dashboard</li></a>
                                                        <a href="/budget-office-budgets-planning" class="links"><li class="list"><img src="images/budget_icon.png" class="img-fluid sidebar_menu_icons"> Budget Planning</li></a>
                                                        <a href="/budget-office-budgets-allocation" class="links"><li class="list"><img src="images/budget_icon.png" class="img-fluid sidebar_menu_icons"> Budget Allocation</li></a>
                                                        <a href="/budget-office-ppmp" class="links"><li class="list"><img src="images/ppmp_icon.png" class="img-fluid sidebar_menu_icons"> Pending PPMP</li></a>
                                                        <a href="/budget-office-approved-ppmp" class="links"><li class="list"><img src="images/ppmp_icon.png" class="img-fluid sidebar_menu_icons"> Approved PPMP</li></a>
                                                        <a href="/budget-office-declined-ppmp" class="links"><li class="list"><img src="images/ppmp_icon.png" class="img-fluid sidebar_menu_icons"> Declined PPMP</li></a>
                                                        <a href="/budget-office-reports" class="links"><li class="list"><img src="images/ppmp_icon.png" class="img-fluid sidebar_menu_icons"> Reports</li></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="admin_content_header">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <img src="images/logo.png" class="img-fluid sidebar_admin_content_header_logo">
                                                <h5 class="text-start sidebar_admin_content_title"><b>CMU Budget and Procurement Monitoring System</b></h5>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-danger mt-3" type="button" data-bs-toggle="modal" data-bs-target="#user_logout"> Logout</button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="user_logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <h5 class="text-center">Are you sure you want to logout?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <form action="/user-logout" method="post">
                                                                        @csrf
                                                                    
                                                                        <button class="btn btn-danger">Continue</button>
                                                                    </form>
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="bo_content_board">
                                        @yield('bo_content')
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