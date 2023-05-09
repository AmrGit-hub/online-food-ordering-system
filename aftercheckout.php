<?php
    include("user_class.php");
    $user = new user();
    $user_id = $_SESSION['user_id'];
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
    <title>Document</title>

    <style>
        .carddd{
            width:850px;
            height:550px;
            background-color:#e8e8e8;
            border-radius:15px;
            margin:50px auto;
            box-shadow: 0 2px 8px 3px rgba(0, 0, 0, 0.28);
            padding:15px;
        }
        .logo{
            width:130px;
            height:130px;
            border-radius:50%;
        }
    </style>

</head>
<body>
    
    <?php
        $user->confirmation($user_id);
    ?>

    <script src="js/all.min.js"></script>
</body>
</html>