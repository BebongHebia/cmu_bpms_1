@extends('bac_folder.bac_sidebar')
@section('bac_content')
    <head>
        <title>BAC PPMP - CMU Budget and Procurement Monitoring System</title>
    </head>
    <body>

        <div class="row">
            <div class="col-sm-12">
                <div class="bac_ppmp_page">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bac_ppmp_page_header">
                                <p class="text-start p-2"><b><i>PPMP</i></b></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bac_ppmp_page_card">
                                <img src="images/card_ppmp_icon.png" class="img-fluid bac_card_icon">
                                <h4 class="text-start"><b>30</b></h4>
                                <p class="text-start">Approved for {{ date("Y") + 1 }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <p class="text-start">List of approved ppmp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bac_ppmp_page_table_container">

                                <div class="bac_ppmp_page_table_wrapper">
                                    <table class="table">
                                        <tr>
                                            <thead class="table-dark">
                                                <th>No.#</th>
                                                <th>PPMP Code</th>
                                                <th>Office/College/Units</th>
                                                <th>Budget Allocated</th>
                                                <th>For Year</th>
                                                <th colspan="2">Action</th>
                                            </thead>
                                        </tr>
    
                                        @foreach ($bac_ppmp_unconsol as $bac_ppmp_unconsol_item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bac_ppmp_unconsol_item->ppmp_code }}</td>
                                                <td>{{ $bac_ppmp_unconsol_item->office_college->office_name }}</td>
                                                <td>₱ {{ number_format($bac_ppmp_unconsol_item->budgets->budget_amount,2) }}</td>
                                                <td>{{ $bac_ppmp_unconsol_item->for_year }}</td>

                                                <td>
                                                    <a href="/budget-office-ppmp/ppmp={{ $bac_ppmp_unconsol_item->id }}" class="btn btn-warning">Show PPMP</a>
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

    </body>
@endsection