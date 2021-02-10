<?php 
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/session.php');
 Session::checkLogin();
 
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helper/format.php');
  
?>


<?php

class AdminLogin{
    
    private $database;
    private $format;


    public function __construct()
    {
    $this->database = new Database();    
    $this->format = new Format();   
    }

    public function adminLogin($adminUser,$adminPass){
        $adminUser=$this->format->Validation($adminUser); //field validation
        $adminPass=$this->format->Validation($adminPass); //field validation

        $adminUser=mysqli_real_escape_string($this->database->conn,$adminUser);  
        $adminPass=mysqli_real_escape_string($this->database->conn,$adminPass);  


        if(empty($adminUser) || empty($adminPass))
        {
            $loginMsg="User name of password must not be empty";
            return $loginMsg;
        }

        else {
            //looks in db to find the row and then adds them to the session 
            $query= "SELECT * FROM admin WHERE adminUser='$adminUser' AND adminPass='$adminPass' ";
            
            $result=$this->database->select($query);
            if( $result!=false){
                $value=$result->fetch_assoc();
                Session::set("adminLogin",true); //to check if the usr is logged in
                Session::set("adminId",$value['adminId']);
                Session::set("adminUser",$value['adminUser']);
                Session::set("adminName",$value['adminName']);
                header("Location:dashboard.php");

            }

            else{
                $loginMsg="username or password not match";
                return $loginMsg;
                }
        }

    }



}


?>