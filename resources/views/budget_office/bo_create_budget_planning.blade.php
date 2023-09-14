<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Budget Plan - CMU Budget and Procurement Monitoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/bo_style/bo.css">
</head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="create_budget_planning_page">



                    <div class="row">
                        <div class="col-sm-12">

                            <div class="create_budget_planning_page_header">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <center>
                                            <img src="images/cmu_logo.png" class="img-fluid bo_create_allocation_logos">
                                        </center>
                                    </div>

                                    <div class="col-sm-4">
                                        <p class="text-center">Central Mindanao University<br>Budget and Procruement Monitoring System<br>Musuan, Maramag<br>Bukidnon, 8709</p>
                                        <p class="text-center"><b>'Create new Budget Planning'</b></p>
                                    </div>

                                    <div class="col-sm-4">
                                        <center>
                                            <img src="images/logo.png" class="img-fluid bo_create_allocation_logos">
                                        </center>
                                    </div>

                                </div>
                            </div>

                            <div class="create_budget_planning_page_header_title">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="text-start p-1"><b>Create new budget plan</b></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="create_budget_planning_page_form_body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="/submit_budget_planning" method="post">
                                            @csrf

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="form-label">Year Budget Plans</label>
                                                    <select class="form-select" name="year_plan">
                                                        <option class="2023">2023</option>
                                                        <option class="2024">2024</option>
                                                        <option class="2025">2025</option>
                                                        <option class="2026">2026</option>
                                                        <option class="2027">2027</option>
                                                        <option class="2028">2028</option>
                                                        <option class="2029">2029</option>
                                                        <option class="2030">2030</option>
                                                        <option class="2031">2031</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label">Budget Amount</label>
                                                    <input type="text" name="budget_amount" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-sm-12">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-success">Submit Budget Plan</button>
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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>