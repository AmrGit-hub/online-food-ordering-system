<?php
include("item_class.php");
$item = new admin_item();

if(isset($_POST['update-iname'])){
    $realrid = $_POST['realrid'];
    $realiname = $_POST['realiname'];
    $iname = $_POST['iname'];
    $item->update_item_name($realrid,$realiname,$iname);
}

if(isset($_POST['update-icost'])){
    $realrid = $_POST['realrid'];
    $realiname = $_POST['realiname'];
    $icost = $_POST['icost'];
    $item->update_item_cost($realrid,$realiname,$icost);
}

if(isset($_POST['update-iimage'])){
    $realrid = $_POST['realrid'];
    $realiname = $_POST['realiname'];
    $iimage = $_POST['iimage'];
    $item->update_item_image($realrid,$realiname,$iimage);
}

if(isset($_POST['update-ides'])){
    $realrid = $_POST['realrid'];
    $realiname = $_POST['realiname'];
    $ides = $_POST['ides'];
    $item->update_item_des($realrid,$realiname,$ides);
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
            <h1 class="mb-5">update item name</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-restaurant-id</label>
                    <input type="text" name="realrid" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="restaurant-id....">
                </div>
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-item-name</label>
                    <input type="text" name="realiname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">item-name</label>
                    <input type="text" name="iname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-name....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-iname" value="update">
                </div>
            </form>
        </div>

        <div class="col-5 ">
            <h1 class="mb-5">update item cost</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-restaurant-id</label>
                    <input type="text" name="realrid" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="restaurant-id....">
                </div>
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-item-name</label>
                    <input type="text" name="realiname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">item-cost</label>
                    <input type="text" name="icost" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-cost....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-icost" value="update">
                </div>
            </form>
        </div>

        <div class="col-5 me-5">
            <h1 class="mb-5">update item image</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-restaurant-id</label>
                    <input type="text" name="realrid" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="restaurant-id....">
                </div>
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-item-name</label>
                    <input type="text" name="realiname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">item-image</label>
                    <input type="text" name="iimage" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-image....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-iimage" value="update">
                </div>
            </form>
        </div>

        <div class="col-5">
            <h1 class="mb-5">update item description</h1>
            <form action="" method="post">
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-restaurant-id</label>
                    <input type="text" name="realrid" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="restaurant-id....">
                </div>
                <div class="one mb-3">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">Current-item-name</label>
                    <input type="text" name="realiname" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-name....">
                </div>
                <div class="one mb-5">
                    <label for="inputrname" class="form-label" style="color:#1b2136;">item-des</label>
                    <input type="text" name="ides" class="form-control w-100 border border-3 border-dark-subtle" id="inputrname" placeholder="item-des....">
                </div>
                <div>
                    <input class="btn btn-primary border-0 px-5" style="background-color:#1b2136;" type="submit" name="update-ides" value="update">
                </div>
            </form>
        </div>

    </div>

    <script src="../js/all.min.js"></script>
</body>
</html>