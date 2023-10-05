@extends('college_folder/college_sidebar')
@section('college_content')
<head>
    <title> College Departments - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            
            <div class="college_ppmp_page">
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="college_ppmp_header">
                            <p class="text-start p-1"><b>PPMP</b></p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="college_ppmp_action_wrapper">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create_ppmp">Create PPMP</button>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="create_ppmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create PPMP</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/college-create-ppmp" method="post">
                                                @csrf

                                                <label class="form-label">Select Budget Year Allocation</label>
                                                <select class="form-select" name="budget_id">

                                                        @if ($myBudgets->count() > 0)
                                                            @foreach ($myBudgets as $item_myBudgets)
                                                                <option value="{{ $item_myBudgets->id }}">{{ $item_myBudgets->year_allocated }}</option>
                                                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                                                <input type="hidden" value="{{ $item_myBudgets->office_id }}" name="office_id">
                                                            @endforeach
                                                        @else
                                                            <Option disabled>No budgets found</Option>
                                                        @endif
                                                       
                                                </select>
                                                
                                                


                                            
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-success">Create PPMP</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="college_ppmp_page_table_wrapper">
                            <div class="college_ppmp_page_table_container">

                                <table class="table">
                                    <thead class="table-dark">
                                        <th>No.#</th>
                                        <th>PPMP Code</th>
                                        <th>Year Allocation</th>
                                        <th>Status</th>
                                        <th rowspan="2">Action</th>
                                    </thead>

                                    @foreach ($myppmp as $item_myppmp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item_myppmp->ppmp_code }}</td>
                                            <td>{{ $item_myppmp->year_allocated }}</td>
                                            <td>
                                                @if ($item_myppmp->ppmp_status == 1)
                                                    Active
                                                @else
                                                    Locked
                                                @endif
                                            </td>
                                            <td rowspan="2">
                                                <form action="/college_generate_my_ppmp" method="post">
                                                    @csrf
                                                    <input type="hidden" name="college_ppmp_id" value="{{ $item_myppmp->ppmp_id }}">
                                                    <button class="btn btn-warning">Print PPMP</button>
                                                </form>
                                                

                                                @if ($item_myppmp->ppmp_status == 1)
                                                    <a href="/college-ppmp/ppmp={{ $item_myppmp->ppmp_code }}" class="btn btn-success">Purchase Item</a>
                                                @else
                                                    <button class="btn btn-success" disabled>Purchase Item</button>
                                                @endif
                                                
                                                <button class="btn btn-danger">Delete</button>
                                                
                                            
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


@endsection