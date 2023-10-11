<?php
    $mysqli = mysqli_connect('localhost', 'root', '12345678', 'cmu_bpms') or die(mysqli_error());
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMU Budget and Procurement Monitoring System</title>
    
    <link rel="stylesheet" href="{{ asset('styles/college_styles/pdf.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Add your CSS styles here if needed -->
    <link rel="stylesheet" href="styles/college_styles/pdf.css" media="print">


    <style>
        /* Your regular table styles here */

        @media print {
            /* Print-specific styles here */
            table thead tr{
                background: red !important;
            }

            #my_purchased_item_table thead th{
                background: red !important;
            }

            /* Add other print-specific styles if needed */
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 my_items_pdf_body">
        <div class="row">
            <div class="col-sm-12">
                <div class="my_purchased_items">

                    <div class="row">
                        <div class="col-sm-4">
                        </div>

                        <div class="col-sm-4">

                        </div>

                        <div class="col-sm-4">
                            <div class="my_purchased_items_buttons">
                                <button class="btn btn-warning" onclick="printPage();">Print PDF</button>
                                <a href="/college-ppmp/ppmp={{ $my_ppmp->ppmp_code }}" class="btn btn-success">Purchase more item</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-start p-2">PPMP FORM 2023</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="text-center">PROJECT PROCUREMENT MANAGEMENT PLAN</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <ol type="1">
                                <li><b>PPMP is considered incorrect of valid if</b>
                                    <ol type="a">
                                        <li><b>form used is other than the prescribed format  which can be downloaded only at www.cmu.edu.ph  and;</b></li>
                                        <li><b>correct format is used but fields were inserted  in PART I of the template</b></li>
                                    </ol>
                                </li>
                                <li><b>Fill out the CSE requirements that are available for purchase in the PS under the PART I.  For other Items that are not available from the PS but is regularly purchased by the agency from other sources, agency must indicate the items  in the PART II  and indicate likewise the unit prices based on its last purchase. To ad insert items are only applicable in PART II.</b></li>
                                <li><b>Once accomplished and finalized, the PPMP 2024 form should be:</b>
                                    <ol type="a">
                                        <li><b>Saved using this format: UPDATED_PPMP2024_Name of Unit/College (e.g. UPDATED_PPMP2024 _BAC).</b></li>
                                        <li><b>The file in excel format should be emailed to bac@cmu.edu.ph</b></li>
                                        <li><b> Printed and signed by the Head of Unit/College Dean. The signed copy must be submitted to the Budget Office.</b></li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($get_my_office as $office_row)
                                <h5 class="text-start p-2"><b>{{ $office_row->office_name }}</b></h5>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="my_purchased_item_table">
                                <thead  id="my_purchased_items_ppmp_table">
                                    <tr>
                                        <th rowspan="2" colspan="2">CODE</th>
                                        <th rowspan="2">GENERAL DESCRIPTION</th>
                                        <th rowspan="2">Unit of Measure</th>
                                        <th>QTY</th>
                                        <th rowspan="2">UNIT COST</th>
                                        <th rowspan="2">ESTIMATE D BUDGET</th>
                                        <th rowspan="2">Mode of Procurement</th>
                                        <th colspan="12">SCHEDULE/MILESTONES OF ACTIVITIES</th>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>May</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Aug</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Dec</th>
                                    </tr>
                                    
                                </thead>
                                <tbody class="table table-striped-success">
                                    <tr>
                                        <td colspan="20" class="table table-warning"><b>PART I. AVAILABLE AT PROCUREMENT SERVICE STORES</b></td>
                                    </tr>
                                    
                                    <?php

                                        $user_id = auth()->user()->id;
                                        
                                        $get_all_my_category_query = $mysqli->query("SELECT * FROM tbl_purchased_items INNER JOIN tbl_item_categories ON  tbl_purchased_items.item_category_id = tbl_item_categories.id WHERE tbl_purchased_items.user_id = '$user_id' GROUP BY tbl_purchased_items.item_category_id");
                                        while($get_all_my_category = $get_all_my_category_query->fetch_assoc()){
                                        
                                    ?>
                                        <tr>
                                            <td colspan="20" class="table table-primary"><b><?php echo $get_all_my_category['item_category_name']?></b>
                                                
                                                <?php

                                                    $item_counters = 0;

                                                    $item_category_id = $get_all_my_category['item_category_id'];

                                                    $my_items_under_my_categories_query = $mysqli->query("SELECT * FROM tbl_purchased_items INNER JOIN tbl_items ON tbl_purchased_items.item_id = tbl_items.id AND tbl_purchased_items.item_code = tbl_items.item_code where tbl_purchased_items.user_id = '$user_id' AND tbl_purchased_items.item_category_id = '$item_category_id'");

                                                    while($my_items_under_my_categories = $my_items_under_my_categories_query->fetch_assoc()){
                                                    
                                                        $item_counters++;
                                                    
                                                ?>
                                                    <tr>
                                                        <td><?php echo  $item_counters;?></td>
                                                        <td><?php echo $my_items_under_my_categories['item_code'];?></td>
                                                        <td><?php echo $my_items_under_my_categories['item_name'];?></td>
                                                        <td><?php echo $my_items_under_my_categories['item_unit_measure'];?></td>
                                                        <td><?php echo $my_items_under_my_categories['quantity_size'];?></td>
                                                        <td><?php echo $my_items_under_my_categories['item_price'];?></td>
                                                        <td>₱<?php echo number_format($my_items_under_my_categories['total_cost'], 2);?></td>
                                                        <td><?php 
                                                            if ($my_items_under_my_categories['item_from'] == 1){
                                                                echo "PS-DBM";
                                                            }
                                                        ?></td>
                                                        
                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['jan'] == 1){
                                                                    echo $my_items_under_my_categories['jan'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['feb'] == 1){
                                                                    echo $my_items_under_my_categories['feb'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['mar'] == 1){
                                                                    echo $my_items_under_my_categories['mar'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['apr'] == 1){
                                                                    echo $my_items_under_my_categories['apr'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['may'] == 1){
                                                                    echo $my_items_under_my_categories['may'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['jun'] == 1){
                                                                    echo $my_items_under_my_categories['jun'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['jul'] == 1){
                                                                    echo $my_items_under_my_categories['jul'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['aug'] == 1){
                                                                    echo $my_items_under_my_categories['aug'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['sep'] == 1){
                                                                    echo $my_items_under_my_categories['sep'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['oct'] == 1){
                                                                    echo $my_items_under_my_categories['oct'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['nov'] == 1){
                                                                    echo $my_items_under_my_categories['nov'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                                
                                                                if ($my_items_under_my_categories['dec'] == 1){
                                                                    echo $my_items_under_my_categories['dec'];
                                                                }else{
                                                                    echo "";
                                                                }

                                                            ?>
                                                        </td>

                                                        

                                                    </tr>

                                                <?php
                                                    }
                                                ?>

                                            </td>
                                        </tr>

                                    <?php
                                        }
                                    ?>
                                    
                                    


                                    
                                    <tr>
                                        <td colspan="20" class="table table-warning"><b>PART II. OTHER ITEMS NOT AVALABLE AT PS BUT REGULARLY PURCHASED FROM OTHER SOURCES (Note: Please indicate price of items)</b></td>
                                    </tr>
                                    @foreach ($my_purchased_items as $rows_my_purchased_items)
                                        @if ($rows_my_purchased_items->ppmp_part == 2)
                                                    
                                            <tr>
                                                <td>{{ $rows_my_purchased_items->id }}</td>
                                                <td>{{ $rows_my_purchased_items->item_code }}</td>
                                                <td>{{ $rows_my_purchased_items->item_name}}</td>
                                                <td>
                                                    @if ($rows_my_purchased_items->item)
                                                        {{ $rows_my_purchased_items->item->item_unit_measure }}
                                                    @else
                                                        No item details available
                                                    @endif
                                                </td>
                                                <td>{{ $rows_my_purchased_items->quantity_size }}</td>
                                                <td>
                                                    @if ($rows_my_purchased_items->item)
                                                        ₱{{ $rows_my_purchased_items->item->item_price }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    ₱{{ number_format($rows_my_purchased_items->total_cost, 2) }}
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->item)
                                                        PS-DBM
                                                    @else
                                                        OUTSIDE
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->jan == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->jan}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->feb == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->feb}}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($rows_my_purchased_items->mar == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->mar}}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($rows_my_purchased_items->apr == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->apr}}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($rows_my_purchased_items->may == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->may}}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if ($rows_my_purchased_items->jun == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->jun}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->jul == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->jul}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->aug == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->aug}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->sep == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->sep}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->oct == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->oct}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->nov == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->nov}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($rows_my_purchased_items->dec == 0)
                                                        
                                                    @else
                                                        {{$rows_my_purchased_items->dec}}
                                                    @endif
                                                </td>
                                                
                                                
                                                

                                            </tr>
                                            
                                        @endif
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>  
            </div>
        </div>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>


    <!-- Add your HTML content here -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
