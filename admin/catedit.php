<?php include '../classes/Category.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

if(!isset($_GET['catId']) || ($_GET['catId'] ==NULL))
{
    echo "<script>window.location='catlist.php'</script>";
}

else{
    $id=$_GET['catId'];
}


$category = new Category();
if($_SERVER['REQUEST_METHOD']=='POST'){ 

	$categoryName=$_POST['catName'];
	$updateCategory=$category->categoryUpdate($categoryName,$id);
}
?>



<div class="main">
            <div class="main-box ">
                <h2>Update Category</h2>
               <div class="box-content copyblock">
                <?php if(isset($updateCategory))
                        echo $updateCategory;
                ?>


<?php

$getCategory=$category->GetCategoryById( $id);
if($getCategory){
    while($result=$getCategory->fetch_assoc()){


?>
    
                 <form method="post" action=" ">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
<?php } } ?>

                </div>
            </div>
        </div>
