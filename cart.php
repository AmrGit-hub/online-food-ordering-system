<?php

    include("cart_class.php");
    include("cardpayment.php");
    include("cashpayment.php");
    include("order_class.php");
    $cart = new cart();
    $card = new card();
    $cash = new cash();
    $order = new order();
    $order_id = $_SESSION['order_id'];

    if(isset($_POST['checkout'])){
        $order->make_reset($order_id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&family=Nunito:wght@300;400;500;600;700;800;900;1000&family=Open+Sans:wght@400;700&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&family=Rubik:wght@400;500;600;700;800&family=Work+Sans:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
    <title>QuickFoodie</title>

</head>
<body style="font-family: 'Poppins', sans-serif;">

    <!--        navbar       -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand ms-4 fs-4" href="#">QuickFoodie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="user_main_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restaurants.php">Restaurants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders_page.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order_history.php">Orders History</a>
                    </li>
                    <li class="nav-item ms-4 me-2">
                        <a class="nav-link position-relative" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="main_page row w-100 mt-3">

        <!-- start cart details -->
        <div class="page p-4 ps-5 col-9">

            <h1 class="">Check Out</h1>
            <h6 style="font-size:13px; color:#a8acaf;" class=" mt-3 ms-2"><i class="fa-solid fa-id-badge pe-1"></i> order id #<?php echo $order_id; ?></h6>
            <table>
                <tr class="border-bottom">
                    <th class="p-3 py-4 pe-5">item_name</th>
                    <th class="p-3 py-4 pe-5">item_quntity</th>
                    <th class="p-3 py-4 pe-5">item_cost</th>
                </tr>
                <?php
                    $cart->add_and_remove_and_update_itemscart();
                ?>
            </table>

            <div class="orderinfo d-flex flex-row align-items-center justify-content-between">
                <div class="totalprice d-flex flex-row align-items-center mt-4 ">
                    <h5>Total :</h4>
                    <p class="ps-4 pt-2 fs-3">$<?php 
                        $total_cost = $cart->calc_total_price_ofcartitems($order_id);
                        $_SESSION['totalcost'] = $total_cost;
                        echo $total_cost; 
                    ?></p>
                </div>
            </div>

        </div>
        <!-- end cart details -->

        <!-- start info details -->

        <div class="info col-3 p-3 sticky-top d-flex flex-column" style="height:90vb; background-color:#f7f8f9; border-radius:15px 0px 0px 15px;">
            <h2 class="text-center fw-semibold">Check Out</h2>
            <h5 style="font-size:24px;" class="pt-4 pb-2">welcome</h5>
            <h3>Mr.<?php echo $_SESSION['fuser_name'] . $_SESSION['luser_name']; ?> </h3>
            <h6 style="font-size:13px; color:#a8acaf;" class="pe-5"><i class="fa-solid fa-id-badge pe-1"></i> your id #<?php echo $_SESSION['user_id']; ?></h6>
            <h6 style="font-size:13px; color:#a8acaf;"><i class="fa-regular fa-id-card pe-1"></i> your username is <?php echo $_SESSION['user_name']; ?></h6>
            
            <?php
                $cash->setinformation();
            ?>
            
            <div class="mt-auto mb-4">
                <form action="" method="post">
                    <input class="btn btn-secondary w-50 border border-0" style="margin-left:70px; background-color:#fdcb46;" name="checkout" type="submit" value="Check Out" id="btn">
                </form>
            </div>
        </div>

        <!-- end info details -->
    </div>
    <script src="js/all.min.js"></script>
</body>
</html>