<?php

include('backend/core/Database.class.php');

class Product extends Database {

    protected $inputs;

    // this function is used to display products from the database
    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

    // this function is used to insert to the database
    public function setProducts() {
        $sku = $this->conn->real_escape_string($_POST['sku']);
        $name = $this->conn->real_escape_string($_POST['name']);
        $price = $this->conn->real_escape_string($_POST['price']);
        $type = $this->conn->real_escape_string($_POST['type']);
        $attributes = $this->conn->real_escape_string($_POST['attributes']);
        $sql = "INSERT INTO products(sku,name,price,type,attributes) VALUES('$sku', '$name', '$price', '$type', '$attributes')";
        $stmt = $this->connect()->query($sql);
        if($stmt==true){
            header("Location:index.php?msg1=insert");
        } else{
            echo "Failed try again!";
        }
    }

    // this function is used to delete products from the database
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if($result==true) {
            header("Location:index.php?msg3=delete");
        } else {
            echo null;
        }
    }
}
    

