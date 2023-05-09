<?php
include("restaurant_class.php");
$rest = new admin_restaurant();

if(isset($_POST['update-rname'])){
    $realrname = $_POST['realrname'];
    $rname = $_POST['rname'];
    $rest->update_restaurant_name($realrname,$rname);
}

if(isset($_POST['update-rstatus'])){
    $realrname = $_POST['realrname'];
    $rstatus = $_POST['rstatus'];
    $rest->update_restaurant_status($realrname,$rstatus);
}

if(isset($_POST['update-rimage'])){
    $realrname = $_POST['realrname'];
    $rimage = $_POST['rimage'];
    $rest->update_restaurant_image($realrname,$rimage);
}

if(isset($_POST['update-rdes'])){
    $realrname = $_POST['realrname'];
    $rdes = $_POST['rdes'];
    $rest->update_restaurant_des($realrname,$rdes);
}
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
    <title>QuickFoodie</title>

</head>
<body class="d-flex flex-row" style="height: 150vb; font-family: 'Poppins', sans-serif;">

    <div class="slidenav sticky-top d-flex flex-column me-5" style="height:100vb; background-color:#ededed;">
        <a href="add_restaurant.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4 mt-5">Add Restaurant</a>
        <a href="update_restaurant.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">Update Restaurant</a>
        <a href="remove_restaurant.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">Remove Restaurant</a>
        <a href="add_item.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">Add food item</a>
        <a href="update_item.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">Update food item</a>
        <a href="remove_item.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">Remove food item</a>
        <a href="add_offer.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">Add offer</a>
        <a href="view_orders.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">View orders</a>
        <a href="view_users.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">View users</a>
        <a href="view_comment.php" class="border-bottom pb-2 px-5 text-black text-decoration-none mb-4">View comments</a>
        <a href="view_restaurant.php" class="border-bottom pb-2 px-3 text-black text-decoration-none mb-4">View restaurants</a>
    </div>

    <div class="content m-5 row">

        <div class="col-5 me-5">
            <h1 class="mb-5">update restaurant name</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-Restaurant-name</label>
                    <input type="text" name="realrname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Restaurant-name</label>
                    <input type="text" name="rname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-name....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-rname" value="update">
                </div>
            </form>
        </div>

        <div class="col-5 ">
            <h1 class="mb-5">update restaurant status</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-Restaurant-name</label>
                    <input type="text" name="realrname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Restaurant-status</label>
                    <input type="text" name="rstatus" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-status....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-rstatus" value="update">
                </div>
            </form>
        </div>

        <div class="col-5 me-5">
            <h1 class="mb-5">update restaurant image</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-Restaurant-name</label>
                    <input type="text" name="realrname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Restaurant-image</label>
                    <input type="text" name="rimage" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-image....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-rimage" value="update">
                </div>
            </form>
        </div>

        <div class="col-5">
            <h1 class="mb-5">update restaurant description</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-Restaurant-name</label>
                    <input type="text" name="realrname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Restaurant-des</label>
                    <input type="text" name="rdes" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="Restaurant-des....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-rdes" value="update">
                </div>
            </form>
        </div>

    </div>

    <script src="../js/all.min.js"></script>
</body>
</html>