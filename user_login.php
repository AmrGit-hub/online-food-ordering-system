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
    <title>Login</title>

</head>
<body style="height: 100vb;">

    <div class="sign_up row h-100">

        <div class="photo col-6">
            <img class="w-100 h-100" src="img/sign5.webp" alt="">
        </div>

        <div class="form col-6 d-flex justify-content-center flex-column align-items-center ">
            <h1 style="color:#161616;">Login</h1>

            <?php
                if($_SERVER['REQUEST_METHOD'] === "POST"){
                    $fusername = $_POST['fusername'];
                    $lusername = $_POST['lusername'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $request_form_class = $user->login($fusername,$lusername,$username,$password);
                    if($request_form_class === 'empty'){
                        echo '<div class="alert alert-danger w-100" role="alert">Sorry you shouldn\'t leave any input empty!</div>';
                    }
                    elseif($request_form_class === 'notfound'){
                        echo '<div class="alert alert-danger w-100" role="alert">Sorry your account not found</div>';
                    }
                }
            ?>

            <form action="" method="POST" class="w-50 mt-5">
                <div class="one mb-3">
                    <label for="inputusername" class="form-label" style="color:#161616;">FirstName</label>
                    <input type="text" name="fusername" class="form-control w-100 border border-3 border-dark-subtle" id="inputusername" placeholder="Your Fristname....">
                </div>
                <div class="one mb-3">
                    <label for="inputusername" class="form-label" style="color:#161616;">LastName</label>
                    <input type="text" name="lusername" class="form-control w-100 border border-3 border-dark-subtle" id="inputusername" placeholder="Your Lastname....">
                </div>
                <div class="one mb-3">
                    <label for="inputusername" class="form-label" style="color:#161616;">UserName</label>
                    <input type="text" name="username" class="form-control w-100 border border-3 border-dark-subtle" id="inputusername" placeholder="Your Username....">
                </div>
                <div class="two mb-5">
                    <label for="inputpassword" class="form-label" style="color:#161616;">Password</label>
                    <input type="text" name="password" class="form-control w-100 border border-3 border-dark-subtle" id="inputpassword" placeholder="Your Password....">
                </div>
                <div class="button d-flex justify-content-center">
                    <input type="submit" name="submit" value="Login now" class="mb-5 btn btn-primary border-0" style="background-color:#161616;">
                </div>
                
            </form>

            <div class="login">
                <p>Don't have account?<a href="sign_up.php">Sign-up.</a></p>
            </div>
        </div>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>