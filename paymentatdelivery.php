<?php include 'inc/header.php'; ?>

<?php
$login =  Session::get("customerLogin");
if ($login == false) {
    header("Location:login.php");
}

?>

<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customerId =  Session::get("customerId");
    $insertOrder = $cart->orderProduct($customerId);
    $delDate = $cart->delDataFromCart();
    header("Location:success.php");
}

?>





<div class="main">
    <div class="content-white">
        <div class="container">
            <div class="row">
                <div class="col-6">

                    <table class="table-profile">
                        <tr>
                            <td>Sl</td>
                            <td>Product</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>

                        </tr>
                        <?php
                        $getPro = $cart->getCartProduct();
                        if ($getPro) {
                            $i = 0;
                            $sum = 0;
                            $qty = 0;
                            while ($result = $getPro->fetch_assoc()) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php echo $result['productName'];  ?></td>

                                    <td>$ <?php echo $result['price'];  ?></td>
                                    <td> <?php echo $result['quantity'];  ?></td>
                                    <td>$
                                        <?php
                                        $total = $result['price'] * $result['quantity'];
                                        echo $total;

                                        ?>

                                    </td>

                                </tr>
                                <?php
                                $qty = $qty +  $result['quantity'];
                                $sum = $sum + $total;


                                ?>


                        <?php }
                        }   ?>


                    </table>



                    <table class="table-amount">
                        <tr>
                            <th>Sub Total : </th>
                            <td>$ <?php echo $sum;  ?></td>
                        </tr>
                        <tr>
                            <th>TVA : </th>
                            <td>
                                10% (<?php echo $vat = $sum * 0.1; ?> )
                            </td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>$<?php
                                    $vat = $sum * 0.1;
                                    $gtotal = $sum + $vat;
                                    echo $gtotal;
                                    ?> </td>
                        </tr>


                        <tr>
                            <th>Quantity :</th>
                            <td> <?php echo $qty; ?></td>
                        </tr>
                    </table>

                </div>






                <div class="col-6">

                    <?php
                    $id = Session::get('customerId');
                    $getdata = $customer->getCustomerData($id);
                    if ($getdata) {
                        while ($result = $getdata->fetch_assoc()) {

                    ?>


                            <table class="table-profile">

                                <tr>

                                    <td colspan="3">
                                        <h2> Your Profile Details </h2>
                                    </td>

                                </tr>

                                <tr>
                                    <td width="20%"> Name </td>
                                    <td width="5%"> : </td>
                                    <td> <?php echo $result['name']; ?> </td>
                                </tr>
                                <tr>
                                    <td> Phone </td>
                                    <td> : </td>
                                    <td> <?php echo $result['phone']; ?> </td>
                                </tr>

                                <tr>
                                    <td> Email </td>
                                    <td> : </td>
                                    <td> <?php echo $result['email']; ?> </td>
                                </tr>
                                <tr>
                                    <td> Address </td>
                                    <td> : </td>
                                    <td> <?php echo $result['address']; ?> </td>
                                </tr>
                                <tr>
                                    <td> City </td>
                                    <td> : </td>
                                    <td><?php echo $result['city']; ?> </td>
                                </tr>
                                <tr>
                                    <td> Zipcode </td>
                                    <td> : </td>
                                    <td> <?php echo $result['zip']; ?> </td>
                                </tr>
                                <tr>
                                    <td> Country </td>
                                    <td> : </td>
                                    <td> <?php echo $result['country']; ?> </td>
                                </tr>


                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td><a href="editUSERprofile.php"> Update Details </a> </td>
                                </tr>


                            </table>


                    <?php   }
                    }  ?>



                </div>



            </div>
        </div>
        <div class="ordernow"> <a href="?orderid=order" class="btn bnt-dark"> Order </a></div>

    </div>
</div>

