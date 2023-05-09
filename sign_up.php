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
    <title>Sign_Up</title>

</head>
<body style="height: 100vb;">

    <div class="sign_up row h-100">
        
        <div class="form col-6 d-flex justify-content-center flex-column align-items-center ">
            <h1 style="color:#1b2136;">Sign-Up</h1>

            <form action="" method="POST" class="w-50 mt-5">
                <?php 
                    if($_SERVER['REQUEST_METHOD'] === "POST"){
                        $fusername = $_POST['fusername'];
                        $lusername = $_POST['lusername'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $rpassword = $_POST['rpassword'];
                
                        
                        $request_form_class = $user->sign_up($fusername,$lusername,$username,$password,$rpassword);

                        if($request_form_class === 'empty'){
                            echo '<div class="alert alert-danger w-100" role="alert">Sorry you shouldn\'t leave any input empty!</div>';
                        }
                        if($request_form_class === 'passworderror'){
                            echo '<div class="alert alert-danger w-100" role="alert">Sorry your password not equile repeated password!</div>';
                        }
                        if($request_form_class === 'userfoundindatabase'){
                            echo '<div class="alert alert-danger w-100" role="alert">Sorry this username is used!</div>';
                        }
                    }  
                ?>
                <div class="one mb-3">
                    <label for="inputusername" class="form-label" style="color:#1b2136;">Username</label>
                    <input type="text" name="fusername" class="form-control w-100 border border-3 border-dark-subtle" id="inputusername" placeholder="Your firstname....">
                </div>
                <div class="one mb-3">
                    <label for="inputusername" class="form-label" style="color:#1b2136;">Username</label>
                    <input type="text" name="lusername" class="form-control w-100 border border-3 border-dark-subtle" id="inputusername" placeholder="Your lastname....">
                </div>
                <div class="one mb-3">
                    <label for="inputusername" class="form-label" style="color:#1b2136;">Username</label>
                    <input type="text" name="username" class="form-control w-100 border border-3 border-dark-subtle" id="inputusername" placeholder="Your Username....">
                </div>
                <div class="two mb-3">
                    <label for="inputpassword" class="form-label" style="color:#1b2136;">Password</label>
                    <input type="text" name="password" class="form-control w-100 border border-3 border-dark-subtle" id="inputpassword" placeholder="Your Password....">
                </div>
                <div class="three mb-5">
                    <label for="inputrpassword" class="form-label" style="color:#1b2136;">R-Password</label>
                    <input type="text" name="rpassword"class="form-control w-100 border border-3 border-dark-subtle" id="inputrpassword" placeholder="Your Password Again...." >
                </div>
                <div class="button d-flex justify-content-center">
                    <input type="submit" name="submit" value="Creat Account" class="mb-5 btn btn-primary " style="background-color:#1b2136;">
                </div>
                
            </form>

            <div class="login">
                <p>Already have account?<a href="user_login.php">Login-Now.</a></p>
            </div>
        </div>

        <div class="photo col-6">
            <img class="h-100 w-100" src="img/sign2.webp" alt="">
        </div>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>