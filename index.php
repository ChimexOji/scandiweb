<?php


include_once 'backend/core/Product.class.php';

$datas = new Product();
$products = $datas->getProducts();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Scandiweb</title>
</head>
<body class="mt-2 px-5 mx-auto">
    <!--Navbar-->
    <nav class="navbar navbar-light border-b border-bottom">
        <div class="container-fluid">
          <a class="navbar-brand text-danger fs-4 px-1">Product List</a>
          <div class="d-flex gap-2 px-3">
            <button class="btn btn-outline-success shadow" type="submit" text="ADD"><a href="productadd.php" class="text-dark">ADD</a></button>
            <button class="btn btn-danger shadow" type="submit" text="MASS DELETE" name="delete">MASS DELETE</button>
          </div>
        </div>
    </nav>

    <!--Cards showing the product list-->
    <div class="row my-2 d-flex">
      <?php foreach($products as $product){ ?>
          <div class="px-5 gy-4 card col-3 m-3"  style="width: 270px;">
            <div class="text-center">

            <!--Checkbox--->
              <div class="form-check m-1">
                  <input class="delete-checkbox form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Default checkbox
                  </label>
              </div>

              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($product['sku']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($product['name']); ?></p>
                <p class="card-text"><?php echo htmlspecialchars($product['price']); ?></p>
                <p class="card-text"><?php echo htmlspecialchars($product['attributes']); ?></p>
              </div>

            </div>
          </div>
      <?php } ?>
    </div>

    <!--Footer-->
    <div class="bg-light text-center border-b border-top mx-auto">
      <p>Scandiweb Test Assignment</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>