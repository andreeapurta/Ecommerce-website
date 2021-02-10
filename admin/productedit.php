<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Brand.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>


<?php

$product = new Product();
if (!isset($_GET['proid']) || ($_GET['proid'] == NULL)) {
    echo "<script>window.location='productedit.php'</script>";
} else {
    $id = $_GET['proid'];
}

$product =  new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateProduct = $product->productUpdate($_POST, $_FILES, $id);
}

?>



<?php

//get update message 
if (isset($updateProduct)) {
    echo $updateProduct;
}
?>



<?php

$getProduct = $product->getProductById($id);
if ($getProduct) {
    // value == counter, fetch_assoc spune sa treaca la rand nou //intoarce primul row din tabela
    while ($value = $getProduct->fetch_assoc()) {


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
                                    <input type="text" placeholder="Enter Product Name..." value="<?php echo $value['productName']; ?>" name="productName" class="medium" />
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
                                                <option <?php

                                                        if ($value['catId'] == $result['catId']) { ?> selected="selected" ; <?php }
                                                                                                                            ?> value="<?php echo $result['catId'];  ?>"><?php echo $result['catName']; ?></option>
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
                                        $getBrand =  $brand->getAllBrands();
                                        if ($getBrand) {
                                            while ($result = $getBrand->fetch_assoc()) {
                                        ?>
                                                <option <?php

                                                        if ($value['brandId'] == $result['brandId']) { ?> selected="selected" ; <?php }
                                                                                                                                ?> value="<?php echo $result['brandId'];  ?>"><?php echo $result['brandName']; ?></option>
                                        <?php   }
                                        } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea name="description">
<?php echo $value['description']; ?>

                            </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input type="text" name="price" value="<?php echo $value['price']; ?>" placeholder="Enter Price..." class="medium" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td>
                                    <img src="<?php echo $value['image']; ?>" height="30%" width=" 30%"> <br>
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

                                        <?php

                                        if ($value['type'] == 0) { ?>
                                            <option selected="selected" value="0">Featured</option>
                                            <option value="1">Not featured</option>

                                        <?php } else { ?>
                                            <option value="0">Featured</option>
                                            <option selected="selected" value="1">Not featured</option>

                                        <?php } ?>


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

            <?php }
    } ?>
                </div>
            </div>
        </div>

  