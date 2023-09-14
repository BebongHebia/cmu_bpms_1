@extends('admin_folder/admin_sidebar')
@section('admin_content')
<head>
    <title>Admin Item Categories - CMU Budget and Procurement Monitoring System</title>
</head>

    <div class="row">
        <div class="col-sm-12">
            <div class="admin_item_categories_page">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="admin_item_categories_page_header">
                            <p class="text-start p-1"><b>Admin Item Categories</b></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="admin_item_categories_page_action_buttons">
                            <div class="d-grid gap-2">
                                
                                <button class="btn btn-success add_new_office_btn" data-bs-toggle="modal" data-bs-target="#add_item_category"><img src="images/icon_button_plus.png" class="img-fluid add_new_office_icon_button"> Add new item category</button>

                                <!-- Modal -->
                                <div class="modal fade" id="add_item_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new item category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/submit-item-category" method="post">
                                                    @csrf

                                                    <center>
                                                        <img src="images/item_category_flat_icon.png" class="img-fluid add_item_category_icon">
                                                    </center>

                                                    <div class="row">

                                                        <div class="col-sm-7">
                                                            <label class="form-label">Item Category Code</label>
                                                            <input type="text" id="generated_code" class="form-control" readonly name="item_category_code">
                                                        </div>
                                                        
                                                        <div class="col-sm-5">
                                                            <label class="form-label">Generate Item Code</label>
                                                            <div class="input-group">
                                                                
                                                                <button class="btn btn-warning" type="button" id="generate_code_btn">Generate Code</button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <label class="form-label">Category Name</label>
                                                            <input type="text" class="form-control" name="item_category_name">

                                                            <label class="form-label">Category Description</label>
                                                            <div class="form-floating">
                                                                <textarea name="item_category_description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
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

                <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="admin_item_categories_table_content">
                            <table class="table">
                                <thead>
                                    <th>Action</th>
                                    <th>No.#</th>
                                    <th>Category Code</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                </thead>

                                @foreach ($item_category as $item_category_item)
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_category{{$item_category_item->id}}">Edit</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit_category{{$item_category_item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item Category</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/submit-edit-item-category" method="POST">
                                                                @csrf

                                                                <center>
                                                                    <img src="images/item_category_flat_icon.png" class="img-fluid add_item_category_icon">
                                                                </center>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" name="id" value="{{$item_category_item->id}}" class="form-control">

                                                                        <label class="form-label">Category Code</label>
                                                                        <input type="text" name="item_category_code" value="{{$item_category_item->item_category_code}}" class="form-control">
                                                                        
                                                                        <label class="form-label">Category Name</label>
                                                                        <input type="text" name="item_category_name" value="{{$item_category_item->item_category_name}}" class="form-control">
                                                                        
                                                                        <label class="form-label">Category Description</label>
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control" name="item_category_description">{{$item_category_item->item_category_description}}</textarea>
                                                                        </div>

                                                                        <label class="form-label">Status</label>
                                                                        <select class="form-select" name="item_category_status">
                                                                            <option value="{{$item_category_item->item_category_status}}">
                                                                                @if ($item_category_item->item_category_status == 1)
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
                                                                <button class="btn btn-success">Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_item_category{{$item_category_item->id}}">Delete</button>


                                            <!-- Modal -->
                                            <div class="modal fade" id="delete_item_category{{$item_category_item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Item Category</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-center"><b>Are you sure you want to delete {{$item_category_item->item_category_code}}</b></h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <form action="/delete-item-category" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$item_category_item->id}}">
                                                                <button class="btn btn-danger">Continue Delete</button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item_category_item->item_category_code }}</td>
                                        <td>{{ $item_category_item->item_category_name }}</td>
                                        <td>{{ $item_category_item->item_category_description }}</td>
                                        <td>
                                            @if ($item_category_item->item_category_status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#generate_code_btn').click(function () {
                // Generate a unique code (you can customize this logic)
                var generatedCode = generateUniqueCode();

                // Display the generated code in the input field
                $('#generated_code').val(generatedCode);
            });

            // Function to generate a unique code (customize this as needed)
            function generateUniqueCode() {
                var timestamp = new Date().getTime();
                return 'ITM' + timestamp; // Customize the code format as needed
            }
        });
    </script>


@endsection