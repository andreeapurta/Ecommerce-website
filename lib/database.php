<?php
class database{
    public $host= "localhost";
    public $user= "root";
    public $pass= ""; 
    public $databaseName= "shop"; 
    public $conn;
    public $error;
    private function connectToDatabase(){

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->databaseName);
        if (!$this->conn) {
            $this->error="connection failed".$this->conn->conect_error;
            return false;
    }
    
}
    public function __construct(){  //to auto get the conn when I create an obj of this class 
        $this->connectToDatabase();
    }

    public function Select($query)
    {
        $result= $this->conn->query($query) or die($this->conn->error.__LINE__);  // mysqli_query - execute the query  // line - magical constant - returns the number of line 
        if($result->num_rows > 0 )  //if this is not empty
        {
            return $result;
        }
        else return false;
    }

    public function Insert($query)
    {
        $insertRow= $this->conn->query($query) or die($this->conn->error.__LINE__);  // mysqli_query - execute the query  // line - magical constant - returns the number of line 
        if ($insertRow){
            return $insertRow;
            exit();        
            }
        else{
            return false;
        }
    }

    public function Update($query)
    {
        $updateRow= $this->conn->query($query) or die($this->conn->error.__LINE__);  // mysqli_query - execute the query  // line - magical constant - returns the number of line 
        if ($updateRow){
            return $updateRow;
            exit();        
            }
        else{
            return false;
        }
    }

    public function Delete($query)
    {
        $deleteRow= $this->conn->query($query) or die($this->conn->error.__LINE__);  // mysqli_query - execute the query  // line - magical constant - returns the number of line 
        if ($deleteRow){
            return $deleteRow;
            exit();        
            }
        else{
            return false;
        }
    }





}
?>