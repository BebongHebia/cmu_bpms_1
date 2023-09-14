<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin add new item - Central Mindanao University Budget and Procurement Monitoring System</title>
    <link rel="stylesheet" href="styles/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="admin_add_new_item_page">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="admin_add_new_item_header">
                                
                                <div class="row">

                                    <div class="col-sm-4">
                                        <center>
                                            <img src="images/logo.png" class="img-fluid adding_logos">
                                        </center>
                                    </div>

                                    <div class="col-sm-4">
                                        <h5 class="text-center">Adding new Item</h5>
                                        <p class="text-center"><b>Central Mindanao University Budget and Procurement Monitoring System</b><br> <b></b>Musuan, Maramag <br> Bukidnon, 8709</p>
                            
                                    </div>

                                    <div class="col-sm-4">
                                        <center>
                                            <img src="images/cmu_logo.png" class="img-fluid adding_logos">
                                        </center>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="admin_add_new_item_label">
                                <p class="text-start p-1"><b>Add new Item</b></p>
                            </div>
                        </div>
                    </div>

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
                                                <input type="text" name="item_code" id="generated_code" class="form-control" readonly>
                                                <button class="btn btn-warning" type="button" id="generate_code_btn">Generate Code</button>
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

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success mt-3">Submit</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
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
                return timestamp; // Customize the code format as needed
            }
        });
    </script>

</body>
</html>