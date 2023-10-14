<?php
    $mysqli = mysqli_connect('localhost', 'root', '12345678', 'cmu_bpms') or die(mysqli_error());

    $user_id = $user_info->id ;

    $ppmp_id = $this_ppmp->id;



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show PPMP - CMU Budget and Procurement Monitoring System</title>
    <link rel="stylesheet" href="/styles/bo_style/bo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bo_show_ppmp_page">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bo_show_ppmp_page_header">
                                <h5 class="text-start">PPMP</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <a href="/budget-office-ppmp" class="btn btn-danger">Baack to main page</a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <div class="bo_show_ppmp_info_header">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <p class="text-start" style="border-bottom:1px solid black"> Office/College/Unit: <b>{{ $office_info->office_name }}</b></p>
                                        <p class="text-start" style="border-bottom:1px solid black"> Personel: <b>{{ $user_info->first_name . " " . $user_info->last_name}}</b></p>
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="text-start" style="border-bottom:1px solid black"> Year Allocated: <b>{{ $budget_plan_info->year_allocated }}</b></p>
                                        <p class="text-start" style="border-bottom:1px solid black"> Budget Amount: <b>₱{{ number_format($budget_plan_info->budget_amount, 2)}}</b></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">   
                        <div class="col-sm-12">
                            <p class="text-start"><i>PPMP 2023 FORM</i></p>
                            <h5 class="text-center">PROJECT PROCUREMENT MANAGEMENT PLAN</h5>
                            <p class="text-start"><i><b>Instructions</b></i></p>
                            <ol type="1">
                                <li><b>A PPMP is considered incorrect or invalid if</b>
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
                                        <li><b>Printed and signed by the Head of Unit/College Dean. The signed copy must be submitted to the Budget Office.</b></li>
                                    </ol>
                                </li>
                            </ol>

                            <h5 class="text-start">{{ $office_info->office_name }}</h5>
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="purchased_item_table">
                                <tr>
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
                                </tr>
                                <tbody>
                                    <tr class="table-warning">
                                        <td colspan="20"><b>PART I. AVAILABLE AT PROCUREMENT SERVICE STORES</b></td>
                                    </tr>
                                    <?php
                                        $this_pruchased_items_category_query = $mysqli->query("SELECT * FROM tbl_purchased_items INNER JOIN tbl_item_categories ON  tbl_purchased_items.item_category_id = tbl_item_categories.id WHERE tbl_purchased_items.user_id = '$user_id' GROUP BY tbl_purchased_items.item_category_id");
                                        while($this_pruchased_items_category = $this_pruchased_items_category_query->fetch_assoc()){

                                        
                                    ?>
                                    <tr class="table-primary">
                                        <td colspan="20"><b><?php echo $this_pruchased_items_category['item_category_name'];?> <span style="color:red">||  Total Procured : 
                                            <?php
                                                $item_category_id = $this_pruchased_items_category['item_category_id'];
                                                $get_total_cost_each_category = mysqli_fetch_assoc($mysqli->query("SELECT sum(tbl_purchased_items.total_cost) as category_total_cost FROM tbl_purchased_items INNER JOIN tbl_items ON tbl_purchased_items.item_id = tbl_items.id AND tbl_purchased_items.item_code = tbl_items.item_code where tbl_purchased_items.user_id = '$user_id' AND tbl_purchased_items.item_category_id = '$item_category_id' AND tbl_purchased_items.ppmp_part = '1'"));
                                                echo "₱ " . number_format($get_total_cost_each_category['category_total_cost'], 2);
                                            ?></span>
                                        </b>
                                            
                                            <?php

                                                    $item_counters = 0;

                                                    $item_category_id = $this_pruchased_items_category['item_category_id'];

                                                    $my_items_under_my_categories_query = $mysqli->query("SELECT * FROM tbl_purchased_items INNER JOIN tbl_items ON tbl_purchased_items.item_id = tbl_items.id AND tbl_purchased_items.item_code = tbl_items.item_code where tbl_purchased_items.user_id = '$user_id' AND tbl_purchased_items.item_category_id = '$item_category_id' AND tbl_purchased_items.ppmp_part = '1'");

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
                                    <tr class="table-warning">
                                        <td colspan="20"><b>PART II. OTHER ITEMS NOT AVALABLE AT PS BUT REGULARLY PURCHASED FROM OTHER SOURCES (Note: Please indicate price of items)</b></td>
                                    </tr>

                                    <?php
                                        $item_counters = 0;
                                        $get_purchased_item_part_2_query = $mysqli->query("select * from tbl_purchased_items where user_id = '$user_id' and ppmp_part = 2");

                                        while ($get_purchased_item_part_2 = $get_purchased_item_part_2_query->fetch_assoc()){
                                            $item_counters++;
                                    ?>

                                        <tr>
                                            <td><?php echo  $item_counters;?></td>
                                            <td><?php echo $get_purchased_item_part_2['item_code'];?></td>
                                            <td><?php echo $get_purchased_item_part_2['item_name'];?></td>
                                            <td>N/A</td>
                                            <td><?php echo $get_purchased_item_part_2['quantity_size'];?></td>
                                            <td>₱ <?php echo number_format($get_purchased_item_part_2['total_cost'] / $get_purchased_item_part_2['quantity_size'], 2)?></td>
                                            <td>₱<?php echo number_format($get_purchased_item_part_2['total_cost'], 2);?></td>
                                            <td>Outisde</td>
                                            
                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['jan'] == 1){
                                                        echo $get_purchased_item_part_2['jan'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['feb'] == 1){
                                                        echo $get_purchased_item_part_2['feb'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['mar'] == 1){
                                                        echo $get_purchased_item_part_2['mar'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['apr'] == 1){
                                                        echo $get_purchased_item_part_2['apr'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['may'] == 1){
                                                        echo $get_purchased_item_part_2['may'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['jun'] == 1){
                                                        echo $get_purchased_item_part_2['jun'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['jul'] == 1){
                                                        echo $get_purchased_item_part_2['jul'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['aug'] == 1){
                                                        echo $get_purchased_item_part_2['aug'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['sep'] == 1){
                                                        echo $get_purchased_item_part_2['sep'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['oct'] == 1){
                                                        echo $get_purchased_item_part_2['oct'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['nov'] == 1){
                                                        echo $get_purchased_item_part_2['nov'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                    
                                                    if ($get_purchased_item_part_2['dec'] == 1){
                                                        echo $get_purchased_item_part_2['dec'];
                                                    }else{
                                                        echo "";
                                                    }

                                                ?>
                                            </td>

                                            

                                        </tr>

                                    <?php
                                        }
                                    ?>

                                    <?php
                                        $get_user_overall_total_cost = mysqli_fetch_assoc($mysqli->query("SELECT sum(tbl_purchased_items.total_cost) as overall_total_cost FROM tbl_ppmps INNER JOIN tbl_purchased_items ON  tbl_ppmps.id = tbl_purchased_items.ppmp_id WHERE tbl_purchased_items.user_id = '$user_id' AND ppmp_id = '$ppmp_id'"));
                                        
                                    ?>

                                    <tr class="table-dark">
                                        <td colspan="20">Total Purchased : <b><?php echo "₱ " . number_format($get_user_overall_total_cost['overall_total_cost'], 2);?></b></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>