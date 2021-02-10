<?php

//
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');


?>


<?php

class Customer
{

  private $database;
  private $format;

  public  function __construct()
  {
    $this->database   = new Database();
    $this->format   = new Format();
  }

  public function registerNewCustomer($data)
  {
    $name      =  mysqli_real_escape_string($this->database->conn, $data['name']);
    $address     =  mysqli_real_escape_string($this->database->conn, $data['address']);
    $city      =  mysqli_real_escape_string($this->database->conn, $data['city']);
    $country     =  mysqli_real_escape_string($this->database->conn, $data['country']);
    $zip       =  mysqli_real_escape_string($this->database->conn, $data['zip']);
    $phone       =  mysqli_real_escape_string($this->database->conn, $data['phone']);
    $email       =  mysqli_real_escape_string($this->database->conn, $data['email']);
    $password        =  mysqli_real_escape_string($this->database->conn, md5($data['pass']));
    if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == ""  || $password == "") {
      $msg = "<span class='error'>Field Must Not be empty .</span> ";
      return $msg;
    }
    $mailquery = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
    $mailchk = $this->database->select($mailquery);
    if ($mailchk != false) {
      $msg = "<span class='error'>Email already exist.</span> ";
      return $msg;
    } else {
      $query = "INSERT INTO customer(name, address, city, country, zip, phone, email, pass) 
          VALUES ('$name','$address','$city','$country','$zip','$phone','$email','$password')";

      $inserted_row = $this->database->insert($query);
      if ($inserted_row) {
        $msg = "<span class='success'>Customer Data Inserted Successfully.</span> ";
        return $msg;
      } else {
        $msg = "<span class='error'>Customer Data Not Inserted .</span> ";
        return $msg;
      }
    }
  }

  public function customerLogin($data)
  {
    $email       =  mysqli_real_escape_string($this->database->conn, $data['email']);
    $pass        =  mysqli_real_escape_string($this->database->conn, md5($data['pass']));
    if ($email == ""  || $pass == "") {
      $msg = "<span class='error'>Field Must Not be empty .</span> ";
      return $msg;
    }

    $query = "SELECT * FROM customer WHERE email='$email' AND pass='$pass' ";
    $result = $this->database->select($query);
    if ($result != false) {
      $value = $result->fetch_assoc();
      Session::set("customerLogin", true);
      Session::set("customerId", $value['id']);
      Session::set("customerName", $value['name']);
      header("Location:profile.php");
    } else {
      $msg = "<span class='error'>Email Or Password Not Matched</span> ";
      return $msg;
    }
  }


  public function getCustomerData($id)
  {
    $query = "SELECT * FROM customer WHERE id ='$id' ";
    $result = $this->database->select($query);
    return $result;
  }


  public function customerUpdate($data, $cmrId)
  {
    $name      =  mysqli_real_escape_string($this->database->conn, $data['name']);
    $address     =  mysqli_real_escape_string($this->database->conn, $data['address']);
    $city      =  mysqli_real_escape_string($this->database->conn, $data['city']);
    $country     =  mysqli_real_escape_string($this->database->conn, $data['country']);
    $zip       =  mysqli_real_escape_string($this->database->conn, $data['zip']);
    $phone       =  mysqli_real_escape_string($this->database->conn, $data['phone']);
    $email       =  mysqli_real_escape_string($this->database->conn, $data['email']);

    if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == "") {
      $msg = "<span class='error'>Field Must Not be empty .</span> ";
      return $msg;
    } else {
      $query = "UPDATE customer
            SET
            name 		= '$name',
            address 	= '$address',
            city 		= '$city',
            country 	= '$country',
            zip 		= '$zip',
            phone		= '$phone',
            email 		= '$email'
            WHERE id    = '$cmrId' ";
      $update_row  = $this->database->update($query);
      if ($update_row) {
        $msg = "<span class='success'>Customer Data Updated Successfully.</span> ";
        return $msg;
      } else {
        $msg = "<span class='error'>Customer Data Not Updated .</span> ";
        return $msg;
      }
    }
  }
}

?>