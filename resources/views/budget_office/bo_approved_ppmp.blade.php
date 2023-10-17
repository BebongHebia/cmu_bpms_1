@extends('budget_office/bo_sidebar')
@section('bo_content')
<head>
    <title>PPMP - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="approved_ppmp_page">
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="approved_ppmp_page_header">
                            <h5 class="text-start p-1">Approved PPMP</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="approved_ppmp_page_card">
                            <img src="images/card_ppmp_icon.png" class="img-fluid card_ppmp_icon">
                            <h5 class="text-start mt-2">100</h5>
                            <p class="text-start">Approved PPMP</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-12">
                        <p class="text-start"><b><i>List of Approved PPMP</i></b></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="approved_ppmp_table_container">
                            <div class="approved_ppmp_table_wrapper">
                                <table class="table table-stripe">
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
                                    <tbody>
                                        
                                        @foreach ($approved_ppmp as $item_approved_ppmp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item_approved_ppmp->ppmp_code }}</td>
                                                <td>{{ $item_approved_ppmp->office_college->office_name }}</td>
                                                <td>₱ {{ number_format($item_approved_ppmp->budgets->budget_amount, 2) }}</td>
                                                <td>₱ {{ number_format($item_approved_ppmp->budgets->bbudget_spent, 2) }}</td>
                                                <td>{{ $item_approved_ppmp->for_year }}</td>
                                                <td>
                                                    <a href="/budget-office-ppmp/ppmp={{ $item_approved_ppmp->id }}" class="btn btn-warning">Show PPMP</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

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