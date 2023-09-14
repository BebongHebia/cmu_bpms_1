@extends('budget_office/bo_sidebar')
@section('bo_content')
<head>
    <title>Budget Allocation - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="budget_office_budget_allocation_container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_office_budget_allocation_container_header">
                            <h5 class="text-start p-1">Budget Allocation</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_office_budget_allocation_container_content">
                            <!-- Content will be provided here -->


                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="budget_office_dashboard_container_content_button_wrapper">
                                        <div class="d-grid gap-2">
                                            <button data-bs-toggle="modal" data-bs-target="#create_budget_allocation" class="btn btn-success" type="button"><img src="images/icon_button_plus.png" class="img-fluid button_add_icon"> Create Budget Allocation</button>
                                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="create_budget_allocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Budget Allocation</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
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
                                        
                                                                            
                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-success">Submit Budget Allocation</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="budget_office_dashboard_container_content_table_header">
                                        <p class="text-start"><b><i>Recent Allocations</i></b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-sm-12">
                                    <div class="budget_office_dashboard_container_content_table_wrapper">
                                        <table class="table">
                                            <thead>
                                                
                                                <th>No.#</th>
                                                <th>College/Unit/Office</th>
                                                <th>Budget Allocated</th>
                                                <th>Year Allocated</th>
                                                <th>Action</th>
                                            </thead>
                                            
                                            @foreach ($budgets as $item_budgets)

                                                @if ($item_budgets->budget_status == 1)
                                                    <tr>
                                                        
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item_budgets->office->office_name }}</td>
                                                        <td>{{ number_format($item_budgets->budget_amount, 2)  }}</td>
                                                        <td>{{ $item_budgets->year_allocated }}</td>
                                                        <td>
                                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_allocation{{ $item_budgets->id }}"><img src="images/delete_icon_btn.png" class="img-fluid delete_icon_btn"> Delete</button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete_allocation{{ $item_budgets->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Allocation</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <p class="text-start p-1">Are you sure you want to delete <b>{{ number_format($item_budgets->budget_amount) }}</b> allocation to <b>{{ $item_budgets->office->office_name }}</b></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <form action="/bo-delete-allocation" method="post">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" value="{{ $item_budgets->id }}" name="id">
                                                                                <input type="hidden" class="form-control" value="{{ $item_budgets->budget_plan_id }}" name="budget_plan_id">
                                                                                <input type="hidden" class="form-control" value="{{ $item_budgets->budget_amount }}" name="budget_amount">
                                                                                <button class="btn btn-danger">Continue</button>
                                                                            </form>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

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


@endsection