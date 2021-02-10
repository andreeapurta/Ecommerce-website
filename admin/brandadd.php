<?php include '../classes/Brand.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

$brand = new Brand();
if($_SERVER['REQUEST_METHOD']=='POST'){ 

	$brandName=$_POST['brandName'];
	$insertBrand=$brand->brandInsert($brandName);
}
?>
  
  <div class="main">
            <div class="main-box ">
                <h2>Add New Brand</h2>
               <div class="box-content copyblock">

                <?php
                if(isset($insertBrand)) //to show the message
                     echo $insertBrand;
                ?>


                 <form method="post" action=" ">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
