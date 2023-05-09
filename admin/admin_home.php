<?php
    session_start();
    $admin_name = $_SESSION['adminname'];
    $admin_id = $_SESSION['adminid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&family=Nunito:wght@300;400;500;600;700;800;900;1000&family=Open+Sans:wght@400;700&family=Poppins:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&family=Rubik:wght@400;500;600;700;800&family=Work+Sans:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="d-flex flex-row" style="height: 150vb; font-family: 'Poppins', sans-serif;">
    <div class="slidenav sticky-top d-flex flex-column" style="height:100vb; background-color:#ededed;">
        <a href="add_restaurant.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4 mt-5">Add Restaurant</a>
        <a href="update_restaurant.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Update Restaurant</a>
        <a href="remove_restaurant.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Remove Restaurant</a>
        <a href="add_item.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Add food item</a>
        <a href="update_item.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Update food item</a>
        <a href="remove_item.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Remove food item</a>
        <a href="add_offer.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Add offer</a>
        <a href="view_orders.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">View orders</a>
        <a href="view_users.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">View users</a>
        <a href="view_comment.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">View comments</a>
        <a href="view_restaurant.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">View restaurants</a>
    </div>

    <div class="content m-5">
        <h1>Welcome Mr.<?php echo $admin_name; ?></h1>
        <h3>your id #<?php echo $admin_id; ?></h3>
    </div>
</body>
</html>