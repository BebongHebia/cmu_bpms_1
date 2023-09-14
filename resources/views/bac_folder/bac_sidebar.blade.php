@extends('layout')
@section('master_layout')
    <head>
        <link rel="stylesheet" href="styles/bac_styles/bac.css">
    </head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bac_page">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="side_bar_container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="side_bar_container_header">
                                            <h5 class="text-center p-3 side_bar_container_role_title">Bids and Awards Commitee Incharge</h5>
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
                                                        <h5 class="text-center admin_sidebar_profile_name">BidsAward D. Smith</h5>
                                                        <p class="text-center admin_sidebar_profile_email">johnsmith@gmail.com</p>
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
                                                        <a href="/budget-officeUnitsCollege" class="links"><li class="list"><img src="images/department_icon.png" class="img-fluid sidebar_menu_icons"> Unit/Office/College</li></a>
                                                        <a href="/budget-office-budgets-allocation" class="links"><li class="list"><img src="images/budget_icon.png" class="img-fluid sidebar_menu_icons"> Budget Allocation</li></a>
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
                                                    <button class="btn btn-danger mt-3" type="button"> Logout</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="bac_content_board">
                                        @yield('bac_content')
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