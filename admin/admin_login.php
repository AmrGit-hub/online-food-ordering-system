<?php
    include("admin.php");
    $admin = new admin();
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
<body style="height:100vb;">
    <div class="box rounded-4 p-3" style="margin:50px auto; height:500px; width:360px; background-color:#f1f1f1;">
        <h2 class="pt-4 text-center">Admin login</h2>
        <h3 class="pb-3 text-center">Welcome</h3>
        <?php
            if(isset($_POST['alogin'])){
                $adminname = $_POST['adminname'];
                $adminpassword = $_POST['adminpassword'];
                $result = $admin->admin_login($adminname,$adminpassword);
                if($result == 'notfound'){
                    echo '<div class="alert alert-danger w-100" role="alert">Sorry your account not found</div>';
                }
            }
        ?>
        <form action="" method="post">
            <div class="two mb-3">
                <label for="inputpassword" class="form-label" style="color:#1b2136;">admin-name</label>
                <input type="text" name="adminname" class="form-control w-100 border border-3 border-dark-subtle" id="inputpassword" placeholder="admin name....">
            </div>
            <div class="three mb-5">
                <label for="inputrpassword" class="form-label" style="color:#1b2136;">admin-Password</label>
                <input type="text" name="adminpassword"class="form-control w-100 border border-3 border-dark-subtle" id="inputrpassword" placeholder="Your Password...." >
            </div>
            <div class="button d-flex justify-content-center">
                <input type="submit" name="alogin" value="Login" class="btn btn-primary border-0" style="background-color:#1b2136;">
            </div>
        </form>
    </div>
</body>
</html>