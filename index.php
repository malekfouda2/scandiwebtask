

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Product list</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='js/main.js'></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
<div class="container mt-3">
  <nav class="navbar navbar-dark bg-secondary">
    <div class="col-sm-8">
      <a class="navbar-brand">Product List</a>
    </div>
    <div class="col-sm-4">
      <div style="float:right">
        <button class="btn btn-sm btn-dark" type="submit" onclick="document.location='add_product.php'" style="display: inline-block; margin-right: 10px">ADD</button>
        <form method="post" action ="delete_products.php" id="delete_form" style="display: inline-block; margin-right: 10px">
          <button class="btn btn-sm btn-danger" type="submit" name="but_delete">
            MASS DELETE
          </button>
        </form>
        
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row text-center py-5">
      <?php include "view_products.php"; ?>
    </div>
  </div>
</div>

