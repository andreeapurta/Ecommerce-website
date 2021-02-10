<?php include '../classes/Category.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php

$category = new Category();
if($_SERVER['REQUEST_METHOD']=='POST'){ 

	$categoryName=$_POST['catName'];
	$insertCategory=$category->categoryInsert($categoryName);
}
?>



         <div class="main">
            <div class="main-box ">
                <h2>Add New Category</h2>
               <div class="box-content copyblock">

                <?php
                if(isset($insertCategory)) //to show the message
                     echo $insertCategory;
                ?>


                 <form method="post" action=" ">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" />
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
