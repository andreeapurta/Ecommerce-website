<?php

//
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');


?>


<?php


class Contact
{

    private $database;
    private $format;


    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }


    public function contactInsert($data)
    {
        $name   =  mysqli_real_escape_string($this->database->conn, $data['name']);
        $email        =  mysqli_real_escape_string($this->database->conn, $data['email']);
        $description        =  mysqli_real_escape_string($this->database->conn, $data['description']);
        if (empty($data)) {
            $msg = "The inputs must not be empty";
            return $msg;
        } else {

            $query = "INSERT INTO contact
            (name, email, description) 
            VALUES ('$name','$email','$description')";
            $inserted = $this->database->insert($query);
            if ($inserted) {
                $msg = "<span class='success'>Question Inserted Successfully.</span> ";
                return $msg;
            } else {
                $msg = "<span class='error'>Question Not Inserted .</span> ";
                return $msg;
            }
        
        }
    }




}


