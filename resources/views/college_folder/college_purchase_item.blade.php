<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ auth()->user()->office->office_name }} - Central Mindanao University Budget and Procurement Monitoring System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/college_styles/college.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="college_purchase_item_page">
            <div class="row">
              <div class="col-sm-10">
                <img src="/images/logo.png" class="img-fluid m-2 sidebar_admin_content_header_logo">
                <img src="/images/cmu_logo.png" class="img-fluid m-2 sidebar_admin_content_header_logo">
              </div>
              <div class="col-sm-2 mt-3">
                <a href="/college-ppmp" class="btn btn-danger">Back to main page</a>
              </div>
            </div>
            
            <div class="row">

              <div class="col-sm-6">
                <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Central Mindanao University Budget and Procurement Monitoring System</b></p>
                <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Name : </b>{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</p>
                <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Office/College : </b>{{ auth()->user()->office->office_name}}</p>
              </div>

              <div class="col-sm-6">
                <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>PPMP CODE : </b> {{ $get_ppmp_details->ppmp_code }}</p>
                <div class="row">
                  <div class="col-sm-6">
                    <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Budget Amount </b> ₱{{ number_format($budgets_details->budget_amount,2) }}</p>

                  </div>
                  <div class="col-sm-6">
                    <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Budget Spent </b> ₱{{ number_format($budgets_details->budget_spent, 2) }}</p>

                  </div>
                </div>
                <p class="text-start" style="border-bottom: 1px solid rgb(190, 190, 190)"><b>Year Allocated : </b>{{ $budgets_details->year_allocated }}</p>
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

                <div class="row">

                  <div class="col-sm-6">
                    <div class="search-container">
                      <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search items">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="d-grid gap-2">
                      <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addng_item_not_available">Add item that is not available</button>

                      <!-- Modal -->
                      <div class="modal fade" id="addng_item_not_available" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Adding item that is not available</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="/college-add-item-ppmp_not_available" method="post">
                                @csrf
                                <input type="hidden" name="ppmp_code" value="{{ $get_ppmp_details->ppmp_code }}">
                                <input type="hidden" name="item_id" value="0">
                                <input type="hidden" name="item_code" value="0">
                                <input type="hidden" name="ppmp_id" value="{{ $get_ppmp_details->id }}">
                                <input type="hidden" name="budget_id" value="{{ $get_ppmp_details->budget_id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="office_id" value="{{ auth()->user()->office->id }}">
                                <input type="hidden" name="item_category_id" value="0">
                                <label class="form-label">Item Name</label>
                                <input type="text" name="item_name" class="form-control">
                                <label class="form-label">Item Price</label>
                                <input type="text" name="item_price" class="form-control">
                                
                                
                                
                                <div class="row">

                                  <div class="col-sm-12">
    
                                    <label class="form-label" for="item_quantity_size">Item Quantity/Size</label>
                                    <input type="text" class="form-control" name="quantity_size" id="item_quantity_size">


                                    <h5 class="text-start">Schedule/Milestone of Activities</h5>
                                    <label class="form-label">January</label>
                                    <input type="text" class="form-control" name="jan">

                                    <label class="form-label">Febuary</label>
                                    <input type="text" class="form-control" name="feb">

                                    <label class="form-label">March</label>
                                    <input type="text" class="form-control" name="mar">

                                    <label class="form-label">April</label>
                                    <input type="text" class="form-control" name="apr">

                                    <label class="form-label">May</label>
                                    <input type="text" class="form-control" name="may">

                                    <label class="form-label">June</label>
                                    <input type="text" class="form-control" name="jun">

                                    <label class="form-label">July</label>
                                    <input type="text" class="form-control" name="jul">

                                    <label class="form-label">August</label>
                                    <input type="text" class="form-control" name="aug">

                                    <label class="form-label">September</label>
                                    <input type="text" class="form-control" name="sep">

                                    <label class="form-label">October</label>
                                    <input type="text" class="form-control" name="oct">

                                    <label class="form-label">November</label>
                                    <input type="text" class="form-control" name="nov">

                                    <label class="form-label">December</label>
                                    <input type="text" class="form-control" name="dec">

                                  </div>

                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success">Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>

                <div class="row mt-2">
                  <div class="col-sm-12">
                    <div class="college_purchase_ppmp_table_wrapper">
                      <div class="college_purchase_ppmp_table_container">
                        <table id="example" class="table table-striped table-bordered">
                          
                          <thead class="table-dark">
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
                                  <td>₱{{ number_format($item_row->item_price, 2) }}</td>
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
                                      @if (($budgets_details->budget_amount - $budgets_details->budget_spent) <= $item_row->item_price)
                                          

                                          <p class="text-start" style="color:red">You already have ₱{{ number_format($budgets_details->budget_amount - $budgets_details->budget_spent, 2) }} left in your budget. You cannot Continue to Procure this item.</p>
                                          
                                      @endif
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
                                        <input type="hidden" name="item_price" value="{{ $item_row->item_price }}">
                                        <input type="hidden" name="item_name" value="{{ $item_row->item_name }}">
                                        
                                        
                                        <div class="row">

                                          <div class="col-sm-12">
                                            <p class="text-start"><b>Item Name : </b>{{ $item_row->item_name }}</p>
                                            <p class="text-start"><b>Item Unit Size/Measure : </b>{{ $item_row->item_unit_measure }}</p>
            
                                            <label class="form-label" for="item_quantity_size">Item Quantity/Size</label>
                                            <input type="text" class="form-control" name="quantity_size" id="item_quantity_size">


                                            <h5 class="text-start">Schedule/Milestone of Activities</h5>
                                            <label class="form-label">January</label>
                                            <input type="text" class="form-control" name="jan">

                                            <label class="form-label">Febuary</label>
                                            <input type="text" class="form-control" name="feb">

                                            <label class="form-label">March</label>
                                            <input type="text" class="form-control" name="mar">

                                            <label class="form-label">April</label>
                                            <input type="text" class="form-control" name="apr">

                                            <label class="form-label">May</label>
                                            <input type="text" class="form-control" name="may">

                                            <label class="form-label">June</label>
                                            <input type="text" class="form-control" name="jun">

                                            <label class="form-label">July</label>
                                            <input type="text" class="form-control" name="jul">

                                            <label class="form-label">August</label>
                                            <input type="text" class="form-control" name="aug">

                                            <label class="form-label">September</label>
                                            <input type="text" class="form-control" name="sep">

                                            <label class="form-label">October</label>
                                            <input type="text" class="form-control" name="oct">

                                            <label class="form-label">November</label>
                                            <input type="text" class="form-control" name="nov">

                                            <label class="form-label">December</label>
                                            <input type="text" class="form-control" name="dec">

                                          </div>

                                        </div>
                                        
        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        @if (($budgets_details->budget_amount - $budgets_details->budget_spent) >= $item_row->item_price)
                                          <button class="btn btn-success">Confirm</button>

                                        @else
                                          
                                          <button class="btn btn-success" disabled>Confirm</button>
                                        @endif
                                        
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
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
                            <table class="table table-striped table-bordered">
                              <thead class="table-dark">
                                <th>No.#</th>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Unit Size/Measure</th>
                                <th>Quantity/Size</th>
                                <th>Cost</th>
                                <th>Estimated Budget</th>
                                <th>Action</th>
                              </thead>
                              <tr>
                                <td colspan="8"><b>Part I Available at procurement services store</b></td>
                              </tr>

                              @foreach ($my_purchased_items as $my_purchased_items_item)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $my_purchased_items_item->item_code }}</td>
                                    <td>{{ $my_purchased_items_item->item_name }}</td>
                                    <td>{{ $my_purchased_items_item->item_unit_measure }}</td>
                                    <td>{{ $my_purchased_items_item->quantity_size }}</td>
                                    <td>₱{{ number_format($my_purchased_items_item->item_price, 2) }}</td>
                                    <td>₱{{ number_format($my_purchased_items_item->total_cost, 2) }}</td>
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
                                                  <input type="hidden" name="purchased_item_id" value="{{ $my_purchased_items_item->purchased_item_id }}">
                                                  <input type="hidden" name="budget_id" value="{{ $budgets_details->id }}">
                                                  <button class="btn btn-danger">Confirm</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                    </td>
                                  </tr>
                              @endforeach
                              <tr>
                                <td colspan="8"><b>Part II: OTHER ITEMS NOT AVALABLE AT PS BUT REGULARLY PURCHASED FROM OTHER SOURCES (Note: Please indicate price of items) </b></td>
                              </tr>

                              @foreach ($my_purchased_purchase_item_no_available as $item_my_purchased_purchase_item_no_available)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item_my_purchased_purchase_item_no_available->item_code }}</td>
                                    <td>{{ $item_my_purchased_purchase_item_no_available->item_name }}</td>
                                    <td>{{ $item_my_purchased_purchase_item_no_available->item_unit_measure }}</td>
                                    <td>{{ $item_my_purchased_purchase_item_no_available->quantity_size }}</td>
                                    <td>₱{{ number_format($item_my_purchased_purchase_item_no_available->item_price, 2) }}</td>
                                    <td>₱{{ number_format($item_my_purchased_purchase_item_no_available->total_cost, 2) }}</td>
                                    <td>
                                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#remove_purchased_item_na{{ $item_my_purchased_purchase_item_no_available->id }}">Remove Item</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="remove_purchased_item_na{{ $item_my_purchased_purchase_item_no_available->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Removing Purchased Items</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="/college-remove-purchased-item_na" method="post">
                                                  @csrf

                                                  <p class="text-start"><b>Item Code : </b> Not Available</p>
                                                  <p class="text-start"><b>Item Name : </b> {{ $item_my_purchased_purchase_item_no_available->item_name }}</p>

                                                  <h5 class="text-center">Are you sure you want to remove this Item?</h5>


                                                  
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <input type="hidden" name="purchased_item_id_na" value="{{ $item_my_purchased_purchase_item_no_available->purchased_item_id }}">
                                                  <input type="hidden" name="budget_id" value="{{ $budgets_details->id }}">
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


  <script type="text/javascript">
    // Get references to the input field and table body
    const searchInput = document.getElementById('searchInput');
      const tableBody = document.querySelector('tbody');

      // Add an event listener to the search input field
      searchInput.addEventListener('input', function() {
        const searchQuery = searchInput.value.toLowerCase();

        // Loop through each table row
        tableBody.querySelectorAll('tr').forEach(function(row) {
          // Get the text content of each cell in the row
          const cellContents = Array.from(row.querySelectorAll('td')).map(function(cell) {
            return cell.textContent.toLowerCase();
          });

          // Check if any cell contains the search query
          const found = cellContents.some(function(content) {
            return content.includes(searchQuery);
          });

          // Show or hide the row based on the search result
          if (found) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

    
  
</html>