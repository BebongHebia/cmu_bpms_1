@extends('budget_office/bo_sidebar')
@section('bo_content')
<head>
    <title>Budget Planning - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="budget_planning_page">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_planning_page_header">
                            <p class="text-start p-2 budget_planning_page_header_text"><b>Budget Planning Page</b></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_planning_page_action_button_wrapper">

                            <div class="budget_planning_page_action_button">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" type="button"  data-bs-toggle="modal" data-bs-target="#create_planning"><img src="images/icon_button_plus.png" class="img-fluid button_add_icon">Create Budget Planning</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="create_planning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Budget Planning</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                                                
                                                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">


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

                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-success">Create Budget Plan</button>
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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_planning_page_table_content">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="budget_planning_page_table">

                                        <table class="table">
                                            <thead>
                                                
                                                <th>No.#</th>
                                                <th>Year Budget</th>
                                                <th>Budget Amount</th>
                                                <th>Budget Allocated</th>
                                                <th>Plan Status</th>
                                                <th>Action</th>
                                            </thead>
                                            @foreach ($budget_plans as $item_budget_plans)
                                                <tr>
                                                    
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item_budget_plans->year_plan }}</td>
                                                    <td>{{ number_format($item_budget_plans->budget_amount) }}</td>
                                                    <td>{{ number_format($item_budget_plans->budget_allocated) }}</td>
                                                    <td>

                                                        @if ($item_budget_plans->plan_status == 1)
                                                            Open
                                                        @else
                                                            Close
                                                        @endif

                                                    </td>
                                                    <td>

                                                        @if ( $item_budget_plans->plan_status == 1)
                                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#close_budget_plan{{$item_budget_plans->id}}">Close Budget Plan</button>
                                                            
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="close_budget_plan{{$item_budget_plans->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Close Budget</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            
                                                                                

                                                                                <label class="form-label">Budget Amount</label>
                                                                                <input type="text" readonly value="{{ number_format($item_budget_plans->budget_amount) }}" class="form-control">

                                                                                <label class="form-label">Budget Allocated</label>
                                                                                <input type="text" readonly value="{{ $item_budget_plans->budget_allocated }}" class="form-control">

                                                                                <label class="form-label">Year Plan</label>
                                                                                <input type="text" readonly value="{{ $item_budget_plans->year_plan }}" class="form-control">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <form action="/budget-office-close-budget-plan" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="id" value="{{ $item_budget_plans->id }}" class="form-control">
                                                                                <button class="btn btn-warning">Continue Close</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else

                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#open_budget_plan{{$item_budget_plans->id}}">Re-Open Budget Plan</button>
                                                            
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="open_budget_plan{{$item_budget_plans->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Re-Open Budget</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        
                                                                            

                                                                            <label class="form-label">Budget Amount</label>
                                                                            <input type="text" readonly value="{{ number_format($item_budget_plans->budget_amount) }}" class="form-control">

                                                                            <label class="form-label">Budget Allocated</label>
                                                                            <input type="text" readonly value="{{ $item_budget_plans->budget_allocated }}" class="form-control">

                                                                            <label class="form-label">Year Plan</label>
                                                                            <input type="text" readonly value="{{ $item_budget_plans->year_plan }}" class="form-control">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <form action="/budget-office-reOpen-budget-plan" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="id" value="{{ $item_budget_plans->id }}" class="form-control">
                                                                                <button class="btn btn-primary">Continue Re-open</button>
                                                                            </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif

                                                        

                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_budget_plan{{ $item_budget_plans->id }}">Delete Budget Plan</button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete_budget_plan{{ $item_budget_plans->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Budget Plan</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                    <p class="text-center">Are you sure you want to delete budget plan <b>{{ $item_budget_plans->year_plan }}</b> Budget Amount <b>{{ number_format($item_budget_plans->budget_amount) }}</b></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <form action="/budget-office-delete-budget-plan" method="post">
                                                                            @csrf
                                                                            <input type="hidden" value="{{ $item_budget_plans->id }}" name="id">
                                                                            <button class="btn btn-danger">Continue</button>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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


@endsection