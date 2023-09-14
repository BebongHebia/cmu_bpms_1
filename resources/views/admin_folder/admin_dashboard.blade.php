@extends('admin_folder/admin_sidebar')
@section('admin_content')
<head>
    <title>Admin Dashboard - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="admin_content_dashboard">
                <div class="row">

                    <div class="col-sm-6">
                        <p class="text-start"><b>Date :</b> {{ date('d-m-Y') }}</p>
                    </div>

                    <div class="col-sm-6">
                        <h5 class="text-start admin_time_now">Time now : </h5><div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="cards_panel_divs">
                            <div class="cards_panel_divs_header">
                                <p class="text-start cards_panel_divs_header_title"><b>Dashboard</b></p>
                            </div>

                            <div class="cards_panels">

                                <div class="_cards">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="_cards_header">
                                                <p class="text-start p-1 _cards_header_title"><b>Office/Workspace/Units</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 p-3">
                                            <div class="_cards_body">
                                                <img src="images/card_icon_offices.png" class="img-fluid card_icon_png">
                                                <h1 class="text-center _cards_body_number">100</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger" type="button">Learn more</button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="_cards">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="_cards_header">
                                                <p class="text-start p-1 _cards_header_title"><b>Personels</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 p-3">
                                            <div class="_cards_body">
                                                <img src="images/card_icon_users.png" class="img-fluid card_icon_png">
                                                <h1 class="text-center _cards_body_number">100</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger" type="button">Learn more</button>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="_cards">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="_cards_header">
                                                <p class="text-start p-1 _cards_header_title"><b>Allocated Budget this year</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 p-3">
                                            <div class="_cards_body">
                                                <img src="images/card_icon_budget.png" class="img-fluid card_icon_png">
                                                <h1 class="text-center _cards_body_number">100</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger" type="button">Learn more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="_cards">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="_cards_header">
                                                <p class="text-start p-1 _cards_header_title"><b>On-going PPMP</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 p-3">
                                            <div class="_cards_body">
                                                <img src="images/card_icon_document.png" class="img-fluid card_icon_png">
                                                <h1 class="text-center _cards_body_number">100</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger" type="button">Learn more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="_cards">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="_cards_header">
                                                <p class="text-start p-1 _cards_header_title"><b>Pending Purchased Request</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 p-3">
                                            <div class="_cards_body">
                                                <img src="images/card_icon_request.png" class="img-fluid card_icon_png">
                                                <h1 class="text-center _cards_body_number">100</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger" type="button">Learn more</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="_cards">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="_cards_header">
                                                <p class="text-start p-1 _cards_header_title"><b>Items Available</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 p-3">
                                            <div class="_cards_body">
                                                <img src="images/card_icon_items.png" class="img-fluid card_icon_png">
                                                <h1 class="text-center _cards_body_number">100</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-danger" type="button">Learn more</button>
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
    </div>

    <script>

    function showTime(){
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";
        
        if(h == 0){
            h = 12;
        }
        
        if(h > 12){
            h = h - 12;
            session = "PM";
        }
        
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        
        setTimeout(showTime, 1000);
        
    }

    showTime();
        
    </script>

@endsection