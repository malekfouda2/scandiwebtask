<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Add Product</title>
</head>
<div class="container mt-3">
  <nav class="navbar navbar-dark bg-secondary">
    <div class="col-sm-8">
      <a class="navbar-brand">Product Add</a>
    </div>
    <div class="col-sm-4">
      <div style="float:right">
        <button class="btn btn-sm btn-dark" type="submit" form="add_form" name="save" style="display: inline-block; margin-right: 10px" onclick="submitAllForms()">SAVE</button>
        <button class="btn btn-sm btn-danger" type="submit" onclick="document.location='index.php'" style="display: inline-block; margin-right: 10px">CANCEL</button>
      </div>
    </div>
  </nav>
</div>
<br>
<br>

<body>
    <div class="container">

        <div class="jumbotron" style="width:30%">
            <div>
                <form action="" id="add_form">
                <div class="form-group">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                </div>
                <div class="form-group">
                    <label for="type">Type Switcher</label>
                    <select class="form-control" id="type" name="type" onchange="showSelectedForm()" required>
                        <option value="">Select Type</option>
                        <option value="dvd">DVD</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="jumbotron product-form" id="dvdForm" style="display:none;">
            <div>
                <div class="form-group">
                    <label for="size">Size(MB)</label>
                    <input type="text" class="form-control" id="size" name="size" placeholder="Size(MB)" required>
                </div>
            </div>
        </div>

        <div class="jumbotron product-form" id="bookForm" style="display:none;">
            <div>
                <div class="form-group">
                    <label for="weight">Weight(KG)</label>
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight(KG)" required>
                </div>
            </div>
        </div>

        <div class="jumbotron product-form" id="furnitureForm" style="display:none;">
            <div>
                <div class="form-group">
                    <label for="length">Length(CM)</label>
                    <input type="text" class="form-control" id="length" name="length" placeholder="Length(CM)" required>
                </div>
                <div class="form-group">
                    <label for="width">Width(CM)</label>
                    <input type="text" class="form-control" id="width" name="width" placeholder="Width(CM)" required>
                </div>
                <div class="form-group">
                    <label for="height">Height(CM)</label>
                    <input type="text" class="form-control" id="height" name="height" placeholder="Height(CM)" required>
                </div>
            </div>
        </div>
        </form>


        <div class="text-center">
        </div>

        <script>
            function submitAllForms() {
                console.log("submitAllForms function is called.");
                var sku = document.getElementById("sku").value;
                var name = document.getElementById("name").value;
                var price = document.getElementById("price").value;
                var type = document.getElementById("type").value;

                var productFormData = new FormData();

                if (type === "dvd") {
                    var size = document.getElementById("size").value;
                    productFormData.append("size", size);
                } else if (type === "book") {
                    var weight = document.getElementById("weight").value;
                    productFormData.append("weight", weight);
                } else if (type === "furniture") {
                    var length = document.getElementById("length").value; 
                    var width = document.getElementById("width").value; 
                    var height = document.getElementById("height").value; 
                    productFormData.append("length", length); 
                    productFormData.append("width", width); 
                    productFormData.append("height", height); 
                }

                var formData = new FormData();
                formData.append("sku", sku);
                formData.append("name", name);
                formData.append("price", price);
                formData.append("type", type);

                for (var pair of productFormData.entries()) {
                    formData.append(pair[0], pair[1]);
                }

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "process.php", true);
                xhr.send(formData);
            }

            function showSelectedForm() {
                var type = document.getElementById("type").value;

                var allForms = document.querySelectorAll(".product-form");
                allForms.forEach(function(form) {
                    form.style.display = "none";
                });

                var selectedForm = document.getElementById(type + "Form");
                if (selectedForm) {
                    selectedForm.style.display = "block";
                }
            }
        </script>
    </div>
</body>

</html>