<?php
    include("user_class.php");
    $user = new user();
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
<body style="height: 150vb; font-family: 'Poppins', sans-serif;">

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
                        <a class="nav-link position-relative" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main_page row w-100 mt-3">

        <div class="page p-3 ps-5 col-9">
            <h1 class="mb-4">Restaurants</h1>
            <div class="restaurants ">
                <?php
                    $user->showallrestaurants();
                ?>                
            </div>
        </div>

        <div class="info col-3 p-3 sticky-top d-flex flex-column" style="height:95vb; background-color:#f7f8f9; border-radius:15px 0px 0px 15px;">
            <h2 class="text-center fw-semibold">QuickFoodie</h2>
            <h5 style="font-size:24px;" class="pt-4 pb-2">welcome</h5>
            <h3>Mr.<?php echo $_SESSION['fuser_name'] . $_SESSION['luser_name']; ?> </h3>
            <h6 style="font-size:13px; color:#a8acaf;" class="pe-5"><i class="fa-solid fa-id-badge pe-1"></i> your id #<?php echo $_SESSION['user_id']; ?></h6>
            <h6 style="font-size:13px; color:#a8acaf;"><i class="fa-regular fa-id-card pe-1"></i> your username is <?php echo $_SESSION['user_name']; ?></h6>
            <a href="cart.php" class="btn btn-secondary w-50 mt-auto mb-4 border border-0 position-relative" style="margin-left:70px; background-color:#fdcb46;">View Cart<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span></a>
        </div>

    </div>

    <script src="js/all.min.js"></script>
</body>
</html>