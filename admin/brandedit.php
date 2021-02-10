<?php include '../classes/Brand.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

if(!isset($_GET['brandId']) || ($_GET['brandId'] ==NULL))
{
    echo "<script>window.location='brandlist.php'</script>";
}

else{
    $id=$_GET['brandId'];
}


$brand = new Brand();
if($_SERVER['REQUEST_METHOD']=='POST'){ 

	$brandName=$_POST['brandName'];
	$brandName=$brand->brandUpdate($brandName,$id);
}
?>



<div class="main">
            <div class="main-box ">
                <h2>Update Brand</h2>
               <div class="box-content">
                <?php if(isset($brandUpdate))
                        echo $brandUpdate;
                ?>


<?php

$getBrand=$brand->GetBrandById( $id);
if($getBrand){
    while($result=$getBrand->fetch_assoc()){


?>
    
                 <form method="post" action=" ">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName'];?>" class="medium" />
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
