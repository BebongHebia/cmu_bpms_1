@extends('budget_office/bo_sidebar')
@section('bo_content')
<head>
    <title>PPMP - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="budget_office_ppmp">
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_office_ppmp_header">
                            <h5 class="text-start p-1">PPMP</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_office_ppmp_card">
                            <img src="images/card_ppmp_icon.png" class="img-fluid card_ppmp_icon">
                            <h5 class="text-start mt-2">100</h5>
                            <p class="text-start">Pending PPMP</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-12">
                        <p class="text-start"><b><i>List of Pending PPMP(s)</i></b></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="budget_office_ppmp_pending_table_container">
                            <div class="budget_office_ppmp_pending_table_wrapper">
                                <table class="table">
                                    <tr>
                                        <thead class="table-dark">
                                            <th>No.#</th>
                                            <th>PPMP Code</th>
                                            <th>Office From</th>
                                            <th>Allocated Budget</th>
                                            <th>Spent</th>
                                            <th>For Year</th>
                                            <th>Action</th>
                                        </thead>
                                    </tr>

                                    @foreach ($pending_ppmp as $item_pending_ppmp)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item_pending_ppmp->ppmp_code }}</td>
                                            <td>{{ $item_pending_ppmp->office_college->office_name }}</td>
                                            <td>₱{{ number_format($item_pending_ppmp->budgets->budget_amount, 2) }}</td>
                                            <td>₱{{ number_format($item_pending_ppmp->budgets->budget_spent, 2) }}</td>
                                            <td>{{ $item_pending_ppmp->for_year }}</td>
                                            <td>
                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ppmp_{{ $item_pending_ppmp->id }}">Approve</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="ppmp_{{ $item_pending_ppmp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pending PPMP</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            ...
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    


@endsection