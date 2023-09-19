<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ auth()->user()->office->office_name }} - Central Mindanao University Budget and Procurement Monitoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/college_styles/college.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="college_purchase_item_page">
            <div class="row">
              <div class="col-sm-12">
                <img src="/images/logo.png" class="img-fluid m-2 sidebar_admin_content_header_logo">
                <img src="/images/cmu_logo.png" class="img-fluid m-2 sidebar_admin_content_header_logo">
              </div>
            </div>
            
            <div class="row">

              <div class="col-sm-6">
                <p class="text-start p-1" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Central Mindanao University Budget and Procurement Monitoring System</b></p>
                <p class="text-start p-1" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Name : </b>{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</p>
                <p class="text-start p-1" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Office/College : </b>{{ auth()->user()->office->office_name}}</p>
              </div>

              <div class="col-sm-6">
                <p class="text-start p-1" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>PPMP CODE : </b> {{ $get_ppmp_details->ppmp_code }}</p>
                <p class="text-start p-1" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Budget Amount </b>{{ number_format($budgets_details->budget_amount) }}</p>
                <p class="text-start p-1" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Year Allocated : </b>{{ $budgets_details->year_allocated }}</p>
              </div>

            </div>
            
            <div class="header_divs">
              <div class="row">
                <div class="col-sm-12">
                  <h5 class="text-start">Create PPMP</h5>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-sm-6 p-3">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>No.#</th>
                          <th>Item Code</th>
                          <th>Item Name</th>
                          <th>Item Description</th>
                          <th>Item Category</th>
                          <th>Item Price</th>
                          <!-- Add more columns as needed -->
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($items as $item_row)
                      <tr style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#select_item{{$item_row->id}}">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item_row->item_code }}</td>
                          <td>{{ $item_row->item_name }}</td>
                          <td>{{ $item_row->item_description }}</td>
                          <td>{{ $item_row->category->item_category_name }}</td>
                          <td>{{ $item_row->item_price }}</td>
                          <!-- Add more columns as needed -->
                      </tr>


                      <!-- Modal -->
                      <div class="modal fade" id="select_item{{$item_row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Item Code {{ $item_row->item_code }}</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="/college-add-item-ppmp" method="post">
                                @csrf
                                <input type="hidden" name="ppmp_code" value="{{ $get_ppmp_details->ppmp_code }}">
                                <input type="hidden" name="item_id" value="{{ $item_row->id }}">
                                <input type="hidden" name="item_code" value="{{ $item_row->item_code }}">
                                <input type="hidden" name="ppmp_id" value="{{ $get_ppmp_details->id }}">
                                <input type="hidden" name="budget_id" value="{{ $get_ppmp_details->budget_id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="office_id" value="{{ auth()->user()->office->id }}">
                                <input type="hidden" name="item_category_id" value="{{ $item_row->category->id }}">

                                <p class="text-start"><b>Item Name : </b>{{ $item_row->item_name }}</p>
                                <p class="text-start"><b>Item Unit Size/Measure : </b>{{ $item_row->item_unit_measure }}</p>

                                <label class="form-label" for="item_quantity_size">Item Quantity/Size</label>
                                <input type="text" class="form-control" name="quantity_size" id="item_quantity_size">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success">Confrim Add</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      @endforeach
                  </tbody>
              </table>

              <script>
                  $(document).ready(function() {
                      $('#example').DataTable();
                  });
              </script>

              </div>

              <div class="col-sm-6">
                
                <div class="my_item_purchased">
                  <div class="row p-2">
                    <div class="col-sm-12">



                      <div class="my_item_purchased_table_header">
                        <h5 class="text-start p-1">My Purchased Items</h5>
                      </div>

                      <div class="my_item_purchased_table_wrapper">
                          <div class="my_purchased_items_table_container">
                            <table class="table">
                              <thead>
                                <th>No.#</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Unit Size/Measure</th>
                                <th>Quantity/Size</th>
                                <th>Cost</th>
                                <th>Action</th>
                              </thead>

                              @foreach ($my_purchased_items as $my_purchased_items_item)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $my_purchased_items_item->item_code }}</td>
                                    <td>{{ $my_purchased_items_item->item_name }}</td>
                                    <td>{{ $my_purchased_items_item->item_unit_measure }}</td>
                                    <td>{{ $my_purchased_items_item->quantity_size }}</td>
                                    <td>{{ $my_purchased_items_item->item_price }}</td>
                                    <td>
                                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#remove_purchased_item{{ $my_purchased_items_item->id }}">Remove Item</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="remove_purchased_item{{ $my_purchased_items_item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Removing Purchased Items</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/college-remove-purchased-item" method="post">
                                                  @csrf

                                                  <p class="text-start"><b>Item Code : </b> {{ $my_purchased_items_item->item_code }}</p>
                                                  <p class="text-start"><b>Item Name : </b> {{ $my_purchased_items_item->item_name }}</p>

                                                  <h5 class="text-center">Are you sure you want to remove this Item?</h5>
                                                
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <input type="hidden" name="purchased_item_id" value="{{ $my_purchased_items_item->id }}">
                                                  <button class="btn btn-danger">Confirm</button>
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
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

    
  
</html>