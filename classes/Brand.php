<?php

//
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>
<?php

class Brand
{
    private $database;
    private $format;
    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function brandInsert($brandName)
    {
        $brandName = $this->format->Validation($brandName); //field validation
        $brandName = mysqli_real_escape_string($this->database->conn, $brandName); //insert data into db 
        if (empty($brandName)) {
            $msg = "Brand must not be empty";
            return $msg;
        } else {

            //looks in db to find the row and then adds them to the session 
            $query = "INSERT INTO brand (brandName) VALUES ('$brandName')";
            $brandInsert = $this->database->insert($query);
            if ($brandInsert) {
                $msg = "<span class='success'> Brand Inserted Succesfull.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> Brand not inserted.</span>";
                return $msg;
            }
        }
    }

    public function getAllBrands()
    {
        $query = "SELECT * FROM brand ORDER BY brandId DESC";
        $result = $this->database->select($query);
        return $result;
    }


    public function GetBrandById($id)
    {
        $query = "SELECT * FROM brand WHERE brandId='$id'";
        $result = $this->database->select($query);
        return $result;
    }

    public function brandUpdate($brandName, $id)
    {
        $brandName = $this->format->Validation($brandName); //field validation
        $id = mysqli_real_escape_string($this->database->conn, $id); //insert data into db 
        $brandName = mysqli_real_escape_string($this->database->conn, $brandName); //insert data into db 
        if (empty($brandName)) {
            $msg = "<span class='error'>Brand field must not be empty.</span>";
            return $msg;
        } else {

            $query = "UPDATE brand  SET brandName='$brandName' WHERE brandId='$id'";
            $brandUpdate = $this->database->update($query);
            if ($brandUpdate) {
                $msg = "<span class='success'> Brand Updated Succesfull.</span>";
                return $msg;
            } else {
                $msg = "<span class='error'> Brand couldn't be Updated.</span>";
                return $msg;
            }
        }
    }

    public function deleteBrandById($id)
    {
        $query = "DELETE FROM brand WHERE brandId='$id'";
        $deleteData = $this->database->delete($query);

        if ($deleteData) {
            $msg = "<span class='success'> Brand Deleted Succesfull.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Brand couldn't be Deleted.</span>";
            return $msg;
        }
    }
}


?>