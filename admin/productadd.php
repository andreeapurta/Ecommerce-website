<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Brand.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>


<?php

$product = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    //$_FILES- global array of items which are being uploaded by via  POST 
    $insertProduct = $product->productInsert($_POST, $_FILES); //all input post type for as $_POST and for image I get this as $_FILES
}
?>



<div class="main">
            <div class="main-box ">
        <h2>Add New Product</h2>
        <div class="box-content">

            <?php
            if (isset($insertProduct)) {
                echo $insertProduct;
            }

            ?>

            <!-- multipart/form-data is used in form element that have a file upload. 
        multi-part means form data divides into multiple parts and send to server. -->
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Product Name..." name="productName" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId">
                                <option>Select Category</option>
                                <?php
                                $category = new Category();  
                                $getCategory =  $category->getAllCategories();  
                                if ($getCategory) {
                                    while ($result = $getCategory->fetch_assoc()) {
                                ?>
                                        <option value="<?php echo $result['catId'];  ?>"><?php echo $result['catName']; ?></option>
                                <?php   }
                                } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="select" name="brandId">
                                <option>Select Brand</option>
                                <?php
                                $brand = new Brand();
                                $getBrand = $brand->getAllBrands();
                                if ($getBrand) {
                                    while ($result = $getBrand->fetch_assoc()) {
                                ?>

                                        <option value="<?php echo $result['brandId'];  ?>"><?php echo $result['brandName']; ?></option>
                                <?php
                                    }
                                }

                                ?>


                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option>Select Type</option>
                                <option value="0">Featured</option>
                                <option value="1">Not featured</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

