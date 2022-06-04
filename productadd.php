<?php

// database
include('backend/core/Product.class.php');
$productObj = new Product();

// insert function 
if(isset($_POST['submit'])){
    $productObj->setProducts($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Product Add</title>
</head>
<body class="mt-3 px-4 mx-auto">
    <!--Navbar-->
    <nav class="navbar navbar-light border-b border-bottom">
        <div class="container-fluid">
          <a class="navbar-brand text-danger fs-4 px-1">Product Add</a>
          <div class="d-flex gap-2 px-3">
            <button class="btn btn-outline-success shadow" type="submit" id="saveButton" text="save" name="save">Save</button>
            <button class="btn btn-danger shadow" type="submit" text="cancel">Cancel</button>
          </div>
        </div>
    </nav>

    <!--Product add forms-->
    <!--Sku form--->
    <form class="mt-4" id="product_form" action="" method="post" >
        <div class="row mb-3">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="sku">
            </div>
          </div>
         <!--Name form--->
          <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="name">
            </div>
          </div>
          <!--Price form--->
          <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="price">
            </div>
          </div>

          <!--Forms for Type Switcher--->
          <div class="mt-lg-4 row mb-3 gx-lg-4">
            <label for="type-switcher" class="col-sm-2 col-form-label">Type Switcher</label>
            <div class="col-sm-4 mx-lg-5">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Type Switcher
                    </button>
                    <ul class="dropdown-menu" id="switcher" aria-labelledby="dropdownMenuButton1">
                      <li id="dropdownBtn" value="dvd" class="dvd" text="DVD"><a class="dropdown-item"  href="#">Disc</a></li>
                      <li id="dropdownBtn" value="book" class="book" text="Book"><a class="dropdown-item" href="#">Book</a></li>
                      <li id="dropdownBtn" value="furniture" class="furniture" text="Furniture"><a class="dropdown-item" href="#">Furniture</a></li>
                    </ul>
                </div>
            </div>
          </div>
        </div>

        <!--ATrributes form for Type Switcher--->
        <div class="type mt-2" id="attributes" aria-hidden="true">
        <!---Attributes form for Book Type--->
          <div class="row" id="book">
            <label for="book-attribute" class="col-sm-2 col-form-label">Weight (KG)</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="weight">
            </div>
            <p class="fw-bold mt-4">Please, provide weight in kg.</p>
          </div>

          <!---Attributes form for DVD Type--->
          <div class="row" id="dvd">
            <label for="dvd-attribute" class="col-sm-2 col-form-label">Size (MB)</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="size">
            </div>
            <p class="fw-bold mt-4">Please, provide size in Mb.</p>
          </div>

          <!---Attributes form for Furniture Type--->
          <div class="row" id="furniture">
            <label for="furniture-height-field" class="col-sm-2 col-form-label">Height (CM)</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="height">
            </div>
            <p class="fw-bold mt-4">Please, provide height in cm.</p>
            <label for="furniture-width-field" class="col-sm-2 col-form-label">Width (CM)</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="width">
            </div>
            <p class="fw-bold mt-4">Please, provide width in cm.</p>
            <label for="furniture-length-field" class="col-sm-2 col-form-label">Length (CM)</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" id="length">
            </div>
            <p class="fw-bold mt-4">Please, provide length in cm.</p>
          </div>
        </div>
    </form>

    // jquery script
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
     

    <script >

const dropdownBtns = document.querySelectorAll("#dropdownBtn")
const bookSctn = document.getElementById("book");
const dvdSctn = document.getElementById("dvd");
const furnitureSctn = document.getElementById("furniture")
const options = document.getElementById("attributes");
const switcher = document.getElementById("switcher")




const sections = {
    book: bookSctn,
    dvd: dvdSctn,
    furniture: furnitureSctn
}

const optionsArr = Array.from(options.children)

for (let i = 0; i < optionsArr.length; i++) {
    options.removeChild(optionsArr[i])
}

let switchVal = null
for (let i = 0; i < dropdownBtns.length; i++) {
    dropdownBtns[i].addEventListener("click", (e) =>{
        switchVal = e.target.innerText
        showOption(e.target)})
}


// switcher.addEventListener("change", (e) => {
//     console.log("hi", e.target.value)
//     switchVal = e.target.value
// })

const showOption = (target) => {
    const d = target.parentElement.className
    console.log({d})
    options.replaceChildren(sections[d])
}

$('#saveButton').click(function(){
       
    let data = null
    const sku = $("#sku").val();
    const name = $("#name").val();
    const price = $("#price").val();
    const options = $("#attributes").val();



    if(switchVal == "Book"){
        const weight = $("#weight").val();
         data =  {
        sku, name,price, switchVal, weight
    }

    }


    
    if(switchVal == "Furniture"){
        const height = $("#height").val();
        const width = $("#width").val();
        const length = $("#length").val();

         data =  {
            sku, name,price, switchVal, height, width, length
        }
 
    }


    
    if(switchVal == "Disc"){
        const size = $("#size").val();
         data =  {
        sku, name,price, switchVal, size
    }
    }

   
    console.log({data})
    
    //Todo add api call here
    return 
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </script>
</html>     