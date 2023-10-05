@extends('admin_folder/admin_sidebar')
@section('admin_content')
<head>
    <title>Admin Dashboard - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="admin_item_page">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="admin_item_page_header">
                            <p class="text-start p-1"><b>Items</b></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="admin_item_page_action_wrapper">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#admin_add_new_item"><img src="images/icon_button_plus.png" class="img-fluid add_new_office_icon_button">Add new item</button>
                            
                                <!-- Modal -->
                                <div class="modal fade" id="admin_add_new_item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new item</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            

                            
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="admin_add_new_item_forms">
                            
                                                            <form action="/submit-new-item" method="POST">
                                                                @csrf
                            
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label">Item Name</label>
                                                                        <input type="text" name="item_name" class="form-control">
                                                                    </div>
                                                                    
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label">Generate Item Code</label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="item_code" id="generated_code" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                            
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label class="form-label">Item Description</label>
                                                                        <div class="form-floating">
                                                                            <textarea name="item_description" class="form-control"id="floatingTextarea2" style="height: 100px"></textarea>
                                                                            <label for="floatingTextarea2">Description</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                            
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label class="form-label">Item Category</label>
                                                                        <select class="form-select" name="item_category_id">
                                                                            @foreach ($category as $item_category)
                                                                                <option value="{{$item_category->id}}">{{$item_category->item_category_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                            
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label">Unit of Measure</label>
                                                                        <select class="form-select" name="item_unit_measure">
                                                                            <option value="Box">Box</option>
                                                                            <option value="Bottle">Bottle</option>
                                                                            <option value="Gallon">Gallon</option>
                                                                            <option value="Unit">Unit</option>
                                                                            <option value="Pack">Pack</option>
                                                                            <option value="Pieces">Pieces</option>
                                                                            <option value="Pouch">Pouch</option>
                                                                            <option value="Can">Can</option>
                                                                            <option value="Roll">Roll</option>
                                                                            <option value="Jar">Jar</option>
                                                                            <option value="Bundle">Bundle</option>
                                                                            <option value="Set">Set</option>
                                                                            <option value="Pair">Pair</option>
                                                                            <option value="Pad">Pad</option>
                                                                            <option value="Rem">Rem</option>
                                                                            <option value="Book">Book</option>
                                                                            <option value="Cart">Cart</option>
                                                                            <option value="License">License</option>
                                                                        </select>
                                                                    </div>
                            
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label">Price</label>
                                                                        <input type="text" class="form-control" name="item_price">
                                                                    </div>
                                                                </div>
                            
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <label class="form-label">Supply From</label>
                                                                        <select class="form-select" name="item_from">
                                                                            <option value="1">PSDBM</option>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-success">Save changes</button>
                                                </form>
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
                        <div class="admin_item_page_table_content">
                            <div class="admin_item_page_table_wrapper">
                                <div class="admin_item_page_table_container">
                                    <table class="table">
                                        <thead>
                                            
                                            <th>No.#</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Item Description</th>
                                            <th>Price</th>
                                            <th>Item Category</th>
                                            <th>Unit of measure</th>
                                            <th>Supplier</th>
                                            <th>Availability</th>
                                            <th>Action</th>
                                        </thead>

                                        @foreach ($items as $item_items)
                                            <tr>
                                                
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item_items->item_code }}</td>
                                                <td>{{ $item_items->item_name }}</td>
                                                <td>{{ $item_items->item_description }}</td>
                                                <td>{{ $item_items->item_price }}</td>
                                                <td>{{ $item_items->category->item_category_name }}</td>
                                                <td>{{ $item_items->item_unit_measure }}</td>
                                                <td>{{ $item_items->item_from }}</td>
                                                <td>
                                                    @if ($item_items->availability == 1)
                                                        Available
                                                    @else
                                                        Not Availabile
                                                    @endif
                                            
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_items{{ $item_items->id }}">Edit</button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="edit_items{{ $item_items->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Items</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/submit-edit-item" method="POST">
                                                                        @csrf
                                                                    
                                                                        <input type="hidden" class="form-control" value="{{ $item_items->id }}" name="id">

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <label class="form-label">Item Code</label>
                                                                            <input type="text" class="form-control" value="{{ $item_items->item_code }}" name="item_code">
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <label class="form-label">Item Name</label>
                                                                            <input type="text" class="form-control" value="{{ $item_items->item_name }}" name="item_name">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label class="form-label">Item Description</label>
                                                                            <div class="form-floating">
                                                                                <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="item_description">{{ $item_items->item_description }}</textarea>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label class="form-label">Item Category</label>
                                                                            <select class="form-select" name="item_category_id">
                                                                                <option value="{{ $item_items->item_category_id }}" selected>{{ $item_items->category->item_category_name }}</option>

                                                                                @foreach ($category as $item_item_category)
                                                                                    <option value="{{ $item_item_category->id }}">{{ $item_item_category->item_category_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">

                                                                            <label class="form-label">Unit of measure</label>
                                                                            <select class="form-select" name="item_unit_measure">
                                                                                <option value="{{$item_items->item_unit_measure}}" selected>{{ $item_items->item_unit_measure }}</option>
                                                                                <option value="Box">Box</option>
                                                                                <option value="Bottle">Bottle</option>
                                                                                <option value="Gallon">Gallon</option>
                                                                                <option value="Unit">Unit</option>
                                                                                <option value="Pack">Pack</option>
                                                                                <option value="Pieces">Pieces</option>
                                                                                <option value="Pouch">Pouch</option>
                                                                                <option value="Can">Can</option>
                                                                                <option value="Roll">Roll</option>
                                                                                <option value="Jar">Jar</option>
                                                                                <option value="Bundle">Bundle</option>
                                                                                <option value="Set">Set</option>
                                                                                <option value="Pair">Pair</option>
                                                                                <option value="Pad">Pad</option>
                                                                                <option value="Rem">Rem</option>
                                                                                <option value="Book">Book</option>
                                                                                <option value="Cart">Cart</option>
                                                                                <option value="License">License</option>
                                                                            </select>
                                                                        </div>


                                                                        <div class="col-sm-6">
                                                                            <label class="form-label">Price</label>
                                                                            <input type="text" class="form-control" value="{{ $item_items->item_price }}" name="item_price">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label class="form-label">Availability</label>
                                                                            <select class="form-select" name="availability">
                                                                                <option value="{{ $item_items->availability }}">
                                                                                    @if ($item_items->availability == 1)
                                                                                        Active

                                                                                    @else
                                                                                        Inactive
                                                                                    @endif
                                                                                </option>

                                                                                <option value="1">Active</option>
                                                                                <option value="0">Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button  class="btn btn-success">Save changes</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_item{{ $item_items->id }}">Delete</button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete_item{{ $item_items->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Item</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5 class="text-center"><b>Are you sure you want to delete item code : <br> {{ $item_items->item_code }}</b></h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <form action="/submit-delete_item" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{ $item_items->id }}">
                                                                        <button class="btn btn-danger">Continue Delete</button>        
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

    

@endsection