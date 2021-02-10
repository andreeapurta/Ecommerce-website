<?php

//
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');


?>




<?php
class Cart
{

    private $database;
    private $format;


    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }



    public function AddProductToCart($quantity, $id)
    {
        $quantity = $this->format->Validation($quantity);
        $quantity = mysqli_real_escape_string($this->database->conn, $quantity);
        $productId = mysqli_real_escape_string($this->database->conn, $id);
        $sessionId = session_id();
        $query = "SELECT * FROM product WHERE productId=$productId";
        $result = $this->database->Select($query)->fetch_assoc();
        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];

        $checkquery = "SELECT * FROM cart WHERE productId='$productId' AND sessionId ='$sessionId' ";
        $getProductduct = $this->database->select($checkquery);
        if ($getProductduct) {
            $msg = "Product Already added in the cart";
            return $msg;
        } else {


            //insert into cart table
            $query = "INSERT INTO cart
            (sessionId, productId, productName, price, quantity, image) 
            VALUES ('$sessionId','$productId','$productName','$price','$quantity', '$image')";
            $inserted = $this->database->insert($query);
            if ($inserted) {
                header("Location:cart.php");
            } else {
                header("Location:pagenotfound.php");
            }
        }
    }

    public function getCartProduct()
    {
        $sessionId = session_id();
        $query = "SELECT * FROM cart WHERE sessionId ='$sessionId' ";
        $result = $this->database->select($query);
        return $result;
    }

    public function updateCartQuantity($cartId, $quantity)
    {
        $cartId =  mysqli_real_escape_string($this->database->conn, $cartId);
        $quantity =  mysqli_real_escape_string($this->database->conn, $quantity);

        $query = "UPDATE cart
                 SET
                 quantity = '$quantity'
                 WHERE cartId = '$cartId' ";
        $update_quantity  = $this->database->update($query);
        if ($update_quantity) {
            header("Location:cart.php");
        } else {
            $msg = "<span class='error'>Quantity Could Not Updated .</span> ";
            return $msg;
        }
    }


    public function UpdateCart($cartId, $quantity)
    {
        $cartId =  mysqli_real_escape_string($this->database->conn, $cartId);
        $quantity =  mysqli_real_escape_string($this->database->conn, $quantity);
        $quantity = $this->format->Validation($quantity);

        $query = "UPDATE cart
             SET
             quantity = '$quantity'
             WHERE cartId = '$cartId' ";
        $update_row  = $this->database->update($query);
        if ($update_row) {
            header("Location:cart.php");
        } else {
            $msg = "<span class='error'>Quantity Could Not Be Updated .</span> ";
            return $msg;
        }
    }


    public function DeleteProductById($deletePorductId){
        $deletePorductId =  mysqli_real_escape_string($this->database->conn, $deletePorductId);
        $query= "DELETE FROM cart  WHERE cartId='$deletePorductId'";
        $deleteProduct  = $this->database->update($query);
        if ($deleteProduct) {
            echo "<script>window.location = 'cart.php';</script> ";

            } else {
            $msg = "<span class='error'>Product Could Not Be Deleted from Cart .</span> ";
            return $msg;
        }


    }



    public function CheckCart(){
        $sessionId = session_id();
        $query = "SELECT * FROM cart WHERE sessionId = '$sessionId'";
        $result = $this->database->select($query);
        return $result;
    }


    public function delDataFromCart(){
        $sessionId = session_id();
        $query = "DELETE FROM cart WHERE sessionId = '$sessionId'";
        $result = $this->database->delete($query);
        return $result;
    }

   

    public function orderProduct($customerId){
        $sessionId = session_id();
        $query = "SELECT * FROM cart WHERE sessionId ='$sessionId' ";
        $getProduct = $this->database->select($query);
         if ($getProduct) {
         while ($result = $getProduct->fetch_assoc()) {
           $productId     = $result['productId'];
           $productName   = $result['productName'];
           $quantity      = $result['quantity'];
           $price         = $result['price'];
           $image         = $result['image'];
       
            $insertquery = "INSERT INTO orders(customerId, productId, productName, quantity, price, image) 
                VALUES ('$customerId','$productId','$productName','$quantity','$price','$image')";  
                $inserted_row = $this->database->insert($insertquery); 
           }
         } 
       
         }


         public function GetOrders(){
            $query = "SELECT * FROM orders";
            $result = $this->database->select($query);
            return $result;
        }


    
}
