@extends('bac_folder.bac_sidebar')
@section('bac_content')
    <head>
        <title>BAC Consilidate PPMP - CMU Budget and Procurement Monitoring System</title>
    </head>
    <body>

        <div class="row">
            <div class="col-sm-12">
                <div class="bac_consolidation_page">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bac_consolidation_page_header">
                                <h5 class="text-start p-1">PPMP Consolidation</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bac_consolidation_page_card">
                                <img src="images/card_ppmp_icon.png" class="img-fluid bac_card_icon">
                                <h4 class="text-start"><b>30</b></h4>
                                <p class="text-start">Approved PPMP for {{ date("Y") + 1 }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <p class="text-start"><i>List of Potential APP</i></p>
                        </div>
                        <div class="col-sm-6">
                            <form action="/bac-create-app" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">Create APP</label>
                                        <select class="form-select" name="for_year">
                                            @foreach ($potential_ppmp as $item_potential_ppmp)
                                                <option value="{{ $item_potential_ppmp->for_year }}">{{ $item_potential_ppmp->for_year }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-grid gap-2">
                                            <br>
                                            <button class="btn btn-success">Create APP</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bac_consolidation_page_ppmp_container">  
                                <div class="bac_consolidation_page_ppmp_warpper">
                                    <table class="table">
                                        <tr>
                                            <thead class="table-dark">
                                                <th>No.#</th>
                                                <th>For Year</th>
                                                <th>PPMP Count</th>
                                            </thead>
                                        </tr>
                                        <tbody>
                                            @foreach ($potential_ppmp as $item_potential_ppmp)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item_potential_ppmp->for_year }}</td>
                                                    <td>{{ $item_potential_ppmp->count }}</td>
                                                    
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

    </body>
@endsection