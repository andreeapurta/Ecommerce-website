<?php

//
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helper/format.php');


?>


<?php


class Category
{

    private $database;
    private $format;


    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }



    public function categoryInsert($categoryName)
    {
        $categoryName = $this->format->Validation($categoryName); //field validation
        $categoryName = mysqli_real_escape_string($this->database->conn, $categoryName); //insert data into db 
        if (empty($categoryName)) {
            $msg = "Category must not be empty";
            return $msg;
        } else {


            //looks in db to find the row and then adds them to the session 
            $query = "INSERT INTO category(catName) VALUES ('$categoryName')";
            $categoryInsert = $this->database->insert($query);
            if ($categoryInsert) {
                $msg = "<span class='success'> Category Inserted Succesfull.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> Category not inserted.</span>";
                return $msg;
            }
        }
    }


    public function getAllCategories()
    {
        $query = "SELECT * FROM category ORDER BY catId DESC";
        $result = $this->database->select($query);
        return $result;
    }


    public function GetCategoryById($id)
    {
        $query = "SELECT * FROM category WHERE catId='$id'";
        $result = $this->database->select($query);
        return $result;
    }

    public function categoryUpdate($categoryName, $id)
    {
        $categoryName = $this->format->Validation($categoryName); //field validation
        $id = mysqli_real_escape_string($this->database->conn, $id); //insert data into db 
        $categoryName = mysqli_real_escape_string($this->database->conn, $categoryName); //insert data into db 
        if (empty($categoryName)) {
            $msg = "<span class='error'>Category field must not be empty.</span>";
            return $msg;
        } else {

            $query = "UPDATE category  SET catName='$categoryName' WHERE catId='$id'";
            $categoryUpdate = $this->database->update($query);
            if ($categoryUpdate) {
                $msg = "<span class='success'> Category Updated Succesfull.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> Category couldn't be Updated.</span>";
                return $msg;
            }
        }
    }

    public function deleteCategoryById($id)
    {
        $query="DELETE FROM category WHERE catId='$id'";
        $deleteData = $this->database->delete($query);
        
        if($deleteData){
            $msg = "<span class='success'> Category Deleted Succesfull.</span>";
            return $msg;
        }
        else {
            $msg = "<span class='error'> Category couldn't be Deleted.</span>";
            return $msg;
        }
        
    }



    
}


?>