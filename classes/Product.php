<?php

//
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');


?>


<?php


class Product
{

    private $database;
    private $format;


    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }



    public function productInsert($data, $file)
    {

        $productName   =  mysqli_real_escape_string($this->database->conn, $data['productName']);
        $catId        =  mysqli_real_escape_string($this->database->conn, $data['catId']);
        $brandId        =  mysqli_real_escape_string($this->database->conn, $data['brandId']);
        $description        =  mysqli_real_escape_string($this->database->conn, $data['description']);
        $price         =  mysqli_real_escape_string($this->database->conn, $data['price']);
        $type        =  mysqli_real_escape_string($this->database->conn, $data['type']);

        // The user opens the page containing a HTML form featuring a text files, a browse button and a submit button.
        // The user clicks the browse button and selects a file to upload from the local PC.
        // The full path to the selected file appears in the text filed then the user clicks the submit button.
        // The selected file is sent to the temporary directory on the server.
        // The PHP script that was specified as the form handler in the form's action attribute checks that the file has arrived and then copies the file into an intended directory.
        // The PHP script confirms the success to the user.


        //$_FILES attributes
        $extensions = array('jpg', 'png', 'jpeg');
        $file_name = $file['image']['name']; //name of file which will be uploaded 
        $file_size = $file['image']['size']; //size of the file
        $file_temp = $file['image']['tmp_name']; //A temporary address where the file is located before processing the upload request

        $div = explode('.', $file_name); //desparte numele de .
        $file_ext = strtolower(end($div));  //transforms the .extension to lowercase
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext; //creates unique hash names  //time in sectonds == 10
        $uploaded_image = "upload/" . $unique_image; //specifies the directory where the file is going to be placed
        if ($productName == "" || $catId == "" || $brandId == "" || $description == "" || $price == "" || $type == "") {
            $msg = "<span class='error'>Field Must Not be empty .</span> ";
            return $msg;
        }
        if (in_array($file_ext, $extensions) === false) {
            $msg = "<span class='error'> Extension not allowed, please choose a JPEG or PNG file.</span> ";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image); //moves from temp to uploaded images
            $query = "INSERT INTO product
            (productName, catId, brandId, description, price, image, type) 
            VALUES ('$productName','$catId','$brandId','$description','$price','$uploaded_image','$type')";
            $inserted = $this->database->insert($query);
            if ($inserted) {
                $msg = "<span class='success'>Product Inserted Successfully.</span> ";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Inserted .</span> ";
                return $msg;
            }
        }
    }

    public function getAllProduct()
    {
        $query = "SELECT product.*, category.catName, brand.brandName 
                        FROM product
                        INNER JOIN category 
                        ON product.catId = category.catId
                        INNER JOIN brand 
                        ON product.brandId = brand.brandId
                        ORDER BY product.productId DESC";
        $result =  $this->database->select($query);
        return $result;
    }


    public function getProductById($id)
    {
        $query = "SELECT * FROM product WHERE productId ='$id' ";
        $result = $this->database->select($query);
        return $result;
    }



    public function productUpdate($data, $file, $id)
    {

        $productName   =  mysqli_real_escape_string($this->database->conn, $data['productName']);
        $catId        =  mysqli_real_escape_string($this->database->conn, $data['catId']);
        $brandId        =  mysqli_real_escape_string($this->database->conn, $data['brandId']);
        $description        =  mysqli_real_escape_string($this->database->conn, $data['description']);
        $price         =  mysqli_real_escape_string($this->database->conn, $data['price']);
        $type        =  mysqli_real_escape_string($this->database->conn, $data['type']);
        $extension = array('jpg', 'png', 'jpeg');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;
        if ($productName == "" || $catId == "" || $brandId == "" || $description == "" || $price == "" || $type == "") {
            $msg = "<span class='error'>Field Must Not be empty .</span> ";
            return $msg;
        } else {
            if (!empty($file_name)) {
                if (in_array($file_ext, $extension) === false) {
                    echo "<span class='error'> You can Upload Only:  " . implode(', ', $extension) . " files" . "</span>";  //implode (glue,string);
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE product
                      SET 
                      productName 	= '$productName',
                      catId 		= '$catId',
                      brandId 		= '$brandId',
                      description 	= '$description',
                      price 		= '$price',
                      image 		= '$uploaded_image',
                      type 			= '$type'
                      WHERE productId = '$id' ";

                    $updated_row = $this->database->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>Product Updated Successfully.</span> ";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Product Not Updated .</span> ";
                        return $msg;
                    }
                }
            } else {

                ///update without image
                $query = "UPDATE product
                      SET 
                      productName 	= '$productName',
                      catId 		= '$catId',
                      brandId 		= '$brandId',
                      description 			= '$description',
                      price 		= '$price',
                      
                      type 			= '$type'
                      WHERE productId = '$id' ";

                $updated_row = $this->database->update($query);
                if ($updated_row) {
                    $msg = "<span class='success'>Product Updated Successfully.</span> ";
                    return $msg;
                } else {
                    $msg = "<span class='error'>Product Not Updated .</span> ";
                    return $msg;
                }
            }
        }
    }

    public function deleteProductById($id)
    {
        $query = "SELECT * FROM product WHERE productId = '$id' ";
        $getData = $this->database->select($query);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $dellink = $delImg['image'];
                unlink($dellink);
            }
        }

        $delquery = "DELETE FROM product WHERE productId = '$id' ";
        $deldata = $this->database->delete($delquery);
        if ($deldata) {
            $msg = "<span class='success'>Product Deleted Successfully.</span> ";
            return $msg;
        } else {
            $msg = "<span class='error'>Product Not Deleted .</span> ";
            return $msg;
        }
    }



    public function getFeaturedProduct()
    {
        $query = "SELECT * FROM product WHERE type = '0' ORDER BY productId DESC LIMIT 4 ";
        $result = $this->database->select($query);
        return $result;
    }



    public function getNewProduct()
    {
        $query = "SELECT * FROM product  ORDER BY productId DESC LIMIT 4 ";
        $result = $this->database->select($query);
        return $result;
    }


    public function getAllProducts()
    {
        $query = "SELECT * FROM product  ORDER BY productId ";
        $result = $this->database->select($query);
        return $result;
    }



    public function getSelectedProduct($id)
    {
        //The INNER JOIN keyword selects all rows from 3 tables as long as there is a match between the columns.
        $query = "SELECT product.*, category.catName, brand.brandName 
                        FROM product
                        INNER JOIN category 
                        ON product.catId = category.catId
                        INNER JOIN brand 
                        ON product.brandId = brand.brandId
                        AND product.productId= $id
                        ORDER BY product.productId DESC";
        $result = $this->database->select($query);
        return $result;
    }


    public function getProductByCategory($id)
    {
        $catId  =  mysqli_real_escape_string($this->database->conn, $id);
        $query = "SELECT * FROM product WHERE catId ='$catId' ";
        $result = $this->database->select($query);
        return $result;
    }


    public function getProductJustByCategory($id)
    {
        $query = "SELECT * FROM category WHERE catId ='$id' ";
        $result = $this->database->select($query);
        return $result;
    }
}
?>