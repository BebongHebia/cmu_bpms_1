<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Budget Allocation - CMU Budget and Procurement Monitoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/bo_style/bo.css">
</head>
  <body>
    <div class="container-fluid">


        <div class="row">
            <div class="col-sm-12">


                <div class="create_budget_allocation_page">

                    
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="bo_create_allocation_form">
                                <form action="/submit-budget-allocation" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="text-start" style="display: none" id="budget_amount_txt"><b>Budget Amount:</b> <span id="budget_amount"></span></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="text-start" style="display: none" id="budget_alloc_txt"><b>Budget Allocated:</b> <span id="budget_allocated"></span></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <p class="text-start" style="display: none" id="budget_year_txt"><b>Budget Year:</b> <span id="budget_year"></span></p>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label class="form-label">Please Select College, Office or Unit</label>
                                            <select class="form-select" name="office_id">
                                                @foreach ($offices as $item_office)
                                                    <option value="{{$item_office->id}}">{{$item_office->office_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-label">Year Budget For</label>
                                            <select id="budget_plan" class="form-select" name="budget_plan_id">
                                                <option value="" disabled selected>Select a plan</option>
                                                @foreach ($budget_plans as $item_budget_plans)
                                                    <option value="{{ $item_budget_plans->id }}" data-budget-amount="{{ $item_budget_plans->budget_amount }}" data-budget-allocated="{{ $item_budget_plans->budget_allocated }}" data-budget-year="{{ $item_budget_plans->year_plan }}">
                                                        {{ $item_budget_plans->year_plan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="form-label" id="budget_allocated_label" style="display: none">Budget Allocated Amount</label>
                                            <input type="text" name="budget_amount" class="form-control" style="display: none" id="budget_allocated_txtbox">
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" id="budget_year_label" style="display: none">Year Allocation</label>
                                            <input type="text" name="year_allocated" class="form-control" style="display: none" id="budget_year_txtbox">
                                            
                                        </div>
                                    </div>

                                    

                                    <div class="row mt-2">
                                        <div class="col-sm-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-success">Submit Budget</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#budget_plan').change(function () {
                var selectedOption = $(this).find(':selected');
                var budgetAmount = selectedOption.data('budget-amount');
                var budgetAllocated = selectedOption.data('budget-allocated');
                var year_plan = selectedOption.data('budget-year');

                var formattedBudgetAmount = parseFloat(budgetAmount).toLocaleString('en-US', {
                style: 'currency',
                currency: 'PHP' // Change to your desired currency code
                });


                $('#budget_amount').text(formattedBudgetAmount);
                $('#budget_allocated').text(parseFloat(budgetAllocated).toLocaleString('en-US', {
                style: 'currency',
                currency: 'PHP' // Change to your desired currency code
                }));
                $('#budget_year').text(year_plan);
                $('#budget_year_txtbox').val(year_plan);

                
                $('#budget_amount_txt').css('display', 'block');
                $('#budget_alloc_txt').css('display', 'block');
                $('#budget_year_txt').css('display', 'block');

                $('#budget_allocated_label').css('display', 'block');
                $('#budget_allocated_txtbox').css('display', 'block');

                $('#budget_year_label').css('display', 'block');
                $('#budget_year_txtbox').css('display', 'block');

            });
        });
    </script>

</body>
</html>