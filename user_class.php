<?php
session_start();


class user{
    private $user_id;
    private $user_name;
    private $user_password;

    function sign_up($fusername,$lusername,$username,$password,$rpassword){
        if(empty($fusername) && empty($lusername) && empty($username) && empty($password) && empty($rpassword)){
            return 'empty';
        }
        elseif($password !== $rpassword){
            return 'passworderror';
        }
        else{
            $dlocalhost = "localhost";
            $duser = "root";
            $dpassword = "";
            $dname = "food_online_system";

            $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query1 = "select * from users where user_name='$username'";
            $result = mysqli_query($con,$query1);
            
            if(mysqli_num_rows($result)>0){
                return 'userfoundindatabase';
            }
            else{
                $query2 = "insert into users(user_name,user_fname,user_lname,user_password) values('$username','$fusername','$lusername','$password')"; 
                mysqli_query($con,$query2);
                mysqli_close($con);

                header("location:user_login.php");
                exit();
            }
        }
    }

    function login($fusername,$lusername,$username,$password){
        if(empty($fusername) && empty($lusername) && empty($username) && empty($password)){
            return 'empty';
        }
        else{
            $dlocalhost = "localhost";
            $duser = "root";
            $dpassword = "";
            $dname = "food_online_system";
            $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
            if (!$con) {
                die("Connection failed");
            }

            $query = "select * from users where user_name='$username'";
            $result = mysqli_query($con,$query);

            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['fuser_name'] = $row['user_fname'];
                $_SESSION['luser_name'] = $row['user_lname'];
                $_SESSION['user_password'] = $row['user_password'];

                header("location:user_main_page.php");
                exit();
            }
            else{
                return 'notfound';
            }
        }
    }

    function restaurants(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from restaurants limit 6";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['restaurant_id'];
                $image = $row['restaurant_image'];
                $name = $row['restaurant_name'];
                $status = $row['restaurant_status'];?>
                <a href="" class="text-decoration-none">
                    <div class="cardr col" >
                        <img src="<?php echo $image;?>" alt="" class="w-100" style="border-radius:25px; height: 230px;">
                        <ul class="card_content d-flex pt-2">
                            <?php echo "<p class='pe-4 me-auto' style='margin-left:-20px; color: #16213E;'>$name</p>" ?>
                            <div class="d-flex ">
                                <p class='pe-4' style="color: #16213E;">at cairo</p>
                                <?php echo "<p style='color: #16213E;'>$status</p>" ?>
                            </div>
                        </ul>
                    </div>
                </a>
            <?php
            }
        }
    }

    function showallrestaurants(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from restaurants";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['restaurant_id'];
                $image = $row['restaurant_image'];
                $name = $row['restaurant_name'];
                $description = $row['restaurant_des'];
                $status = $row['restaurant_status'];
                
                ?>
                <div class="d-flex flex-row mb-3 mt-5 border-bottom pb-3" style="height:130px; width:80%;">
                    <img src="<?php echo $image; ?>" alt="" class="h-100 pe-3" style="width: 137px;">
                    <div class="restbody d-flex flex-column">
                        <h5 class="pt-1"><?php echo $name; ?></h3>
                        <h6><?php echo $description; ?></h3>
                        <h7>delivary in 45m</h6>
                        <p style="font-size:15px; color:#a8acaf;"><?php echo $status; ?></p>
                    </div>
                    <?php
                        if(isset($_POST['submit'])){
                            $_SESSION['restaurant_id'] = $_POST['restaurant_id'];
                            header("location:restaurant_page.php");
                            exit();
                        }
                    ?>
                    <form method="POST" style="margin-right:15px; margin-top:65px;" class="d-flex justify-content-center align-items-center ms-auto">
                        
                        <input class="border border-0 rounded-3" style="color:white; background-color:#fdcb46;"  type="submit" name="submit" value="Show" > 
                        <input type="hidden" name="restaurant_id" value="<?php echo $id; ?>">
                    </form>
                </div>
            <?php
            }
        }
    }

    function showrestaurantinfo($id){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from restaurants where restaurant_id = '$id'";
        $result = mysqli_query($con,$query);

        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function showallitems($restaurant_id){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query1 = "select * from items where restaurant_id = '$restaurant_id'";
        $result = mysqli_query($con,$query1);

        

        if(mysqli_num_rows($result)>0){
            if(isset($_POST['add'])){
                $item_id = $_POST['item_id']; 
                $item_name = $_POST['item_name']; 
                $item_des = $_POST['item_description']; 
                $item_image = $_POST['item_image']; 
                $item_cost = $_POST['item_cost'];
                $order_id = $_SESSION['order_id'];
                $item_quentity = 1;

                $sql = "select item_id from orderitems where order_id = $order_id and item_id=$item_id"; 
                $sqlresult = mysqli_query($con,$sql);
                if(mysqli_num_rows($sqlresult)>0){
                    echo "<script>alert('item already added');</script>";
                }
                else{
                    $query = "insert into orderitems(item_id , item_name , item_quentity , order_id , cost_of_item , item_image,item_description) 
                    values($item_id , '".$item_name."' , $item_quentity , $order_id , $item_cost , '".$item_image."','".$item_des."')";
                    mysqli_query($con,$query);
                }
            }
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['item_id'];
                $image = $row['item_image'];
                $name = $row['item_name'];
                $description = $row['item_des'];
                $cost = $row['item_cost'];
                
                ?>
                <div class="d-flex flex-row mb-4 border-bottom pb-3" style="height:130px; width:85%;">
                    <img src="<?php echo $image; ?>" alt="" class="h-100 pe-3 rounded-2" style="width: 137px;">
                    <div class="restbody d-flex flex-column">
                        <h5 class="pt-2"><?php echo $name; ?></h3>
                        <h6><?php echo $description; ?></h3>
                        <p style="font-size:15px; color:#a8acaf;" class="mt-auto"><?php echo $cost; ?>$</p>
                    </div>
                    <form method="POST" style="margin-right:15px; margin-top:65px;" class="d-flex justify-content-center align-items-center ms-auto">  
                        <input class="border border-0 rounded-3" style="color:white; background-color:#fdcb46;"  type="submit" name="add" value="Add to cart" > 
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="item_name" value="<?php echo $name; ?>">
                        <input type="hidden" name="item_description" value="<?php echo $description; ?>">
                        <input type="hidden" name="item_image" value="<?php echo $image; ?>">
                        <input type="hidden" name="item_cost" value="<?php echo $cost; ?>">
                    </form>
                </div>
            <?php
            }
            mysqli_close($con);
        }
    }

    function selectorderid(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * FROM orders ORDER BY order_id DESC LIMIT 1";
        $result = mysqli_query($con , $query);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            return $row['order_id']+1;
        }
        else{
            return 1;
        }
    }

    function showresentorders(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }
        $user_id = $_SESSION['user_id'];
        $query = "select * from orders where user_id=$user_id and order_status='preparing'";
        $result = mysqli_query($con,$query);

        

        while($row = mysqli_fetch_assoc($result)){
            $order_id = $row['order_id'];
            $_SESSION['order_id'] = $order_id;
            $order_date = $row['order_date'];
            $restaurant_id = $row['restaurant_id'];
            $order_status = $row['order_status'];
            ?>

            <div class="order col-5 me-5 mb-5 d-flex flex-column rounded-4" style="height:350px; background-color:#e1e3e5;">
                <div class="d-flex flex-row justify-content-between pt-2">
                    <p class="pt-1 fs-7"><?php echo $order_date; ?></p>
                    <?php
                        if($order_status === 'preparing'){?>
                            <h6 class="">order_id #<?php echo $order_id; ?> <span class="ps-2"> <i class="fa-solid fa-location-dot rounded-circle" style="background-color:#198754; color:#ffffff; padding:5px; padding-left:7px; padding-right:7px;"></i></span></h6>
                        
                        <?php
                        }?>
                    <?php
                        if($order_status === 'canceled'){?>
                            <h6 class="">order_id #<?php echo $order_id; ?> <span class="ps-2"> <i class="fa-solid fa-xmark rounded-circle" style="background-color:#dc3545; color:#ffffff; padding:5px; padding-left:7px; padding-right:7px;"></i></span></h6>
                            
                        <?php
                        }?>
                    <?php
                        if($order_status === 'finished'){?>
                            <h6 class="">order_id #<?php echo $order_id; ?> <span class="ps-2"> <i class="fa-solid fa-check p-1 rounded-circle" style="background-color:#198754; color:#ffffff;"></i></span></h6>
                            
                        <?php
                        }


                    ?>
                </div>
                <div class="info p-2 pt-1">
                    <?php
                    if(isset($_POST['cancel'])){
                        
                        $sql = "update orders SET order_status='canceled' WHERE order_id=$order_id";
                        mysqli_query($con,$sql);
                        mysqli_close($con);
                        header("location: ".$_SERVER['REQUEST_URI']);
                    }
                    ?>
                    <?php 
                        $query1 = "select restaurant_image,restaurant_name from restaurants where restaurant_id=$restaurant_id";
                        $result1 = mysqli_query($con,$query1);
                        while($row = mysqli_fetch_assoc($result1)){
                            $restaurant_image = $row['restaurant_image'];
                            $restaurant_name = $row['restaurant_name'];?>
                            <img class="rounded-circle" src="<?php echo $restaurant_image; ?>" alt="" style="height:80px; width:80px;">
                            <h5 class="pt-1 pb-1"><?php echo $restaurant_name; ?></h4>
                        <?php
                        }?>

                        <?php
                            $query2 = "select cost_of_item,item_name,item_quentity from allitemsoforders where order_id=$order_id";
                            $result2 = mysqli_query($con,$query2);
                            $order_cost = 0;
                            while($row = mysqli_fetch_assoc($result2)){
                                $item_cost = $row['cost_of_item'];
                                $item_name = $row['item_name'];
                                $item_quentity = $row['item_quentity'];
                                $order_cost += $item_cost;?>
                                <h6 class="pb-1"><span class=" rounded-1" style="background-color:#ffffff; padding:1px; padding-left:2px; padding-right:2px;"><?php echo $item_quentity; ?></span> <?php echo $item_name; ?> <span class="ps-4 ">Cost: $<?php echo $item_cost; ?></span></h6>
                            <?php
                            }
                        ?>

                </div>
                <div class="id d-flex flex-row justify-content-between mt-auto">
                    
                    <h5>Total:$<?php echo $order_cost; ?></h5>
                    <form action="" method="post" class=" mb-3 ms-3 ">
                        <input class="btn btn-secondary border-0" type="submit" name="cancel" value="Cancel">
                        <?php $id = $_SESSION['order_id'];?>
                        <input type="hidden" name="order_id" value="<?php $id ?>">
                    </form>
                    
                </div>
            </div>
            
            <?php
        
        }
    }

    function showordershistory(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }
        $user_id = $_SESSION['user_id'];
        $query = "select * from orders where user_id=$user_id";
        $result = mysqli_query($con,$query);

        

        while($row = mysqli_fetch_assoc($result)){
            $order_id = $row['order_id'];
            $_SESSION['order_id'] = $order_id;
            $order_date = $row['order_date'];
            $restaurant_id = $row['restaurant_id'];
            $order_status = $row['order_status'];
            ?>

            <div class="order col-5 me-5 mb-5 d-flex flex-column rounded-4" style="height:350px; background-color:#e1e3e5;">
                <div class="d-flex flex-row justify-content-between pt-2">
                    <p class="pt-1 fs-7"><?php echo $order_date; ?></p>
                    <?php
                        if($order_status === 'preparing'){?>
                            <h6 class="">order_id #<?php echo $order_id; ?> <span class="ps-2"> <i class="fa-solid fa-location-dot rounded-circle" style="background-color:#198754; color:#ffffff; padding:5px; padding-left:7px; padding-right:7px;"></i></span></h6>
                        
                        <?php
                        }?>
                    <?php
                        if($order_status === 'canceled'){?>
                            <h6 class="">order_id #<?php echo $order_id; ?> <span class="ps-2"> <i class="fa-solid fa-xmark rounded-circle" style="background-color:#dc3545; color:#ffffff; padding:5px; padding-left:7px; padding-right:7px;"></i></span></h6>
                            
                        <?php
                        }?>
                    <?php
                        if($order_status === 'finished'){?>
                            <h6 class="">order_id #<?php echo $order_id; ?> <span class="ps-2"> <i class="fa-solid fa-check p-1 rounded-circle" style="background-color:#0d6efd; color:#ffffff;"></i></span></h6>
                            
                        <?php
                        }


                    ?>
                </div>
                <div class="info p-2 pt-1">
                    <?php 
                        $query1 = "select restaurant_image,restaurant_name from restaurants where restaurant_id=$restaurant_id";
                        $result1 = mysqli_query($con,$query1);
                        while($row = mysqli_fetch_assoc($result1)){
                            $restaurant_image = $row['restaurant_image'];
                            $restaurant_name = $row['restaurant_name'];?>
                            <img class="rounded-circle" src="<?php echo $restaurant_image; ?>" alt="" style="height:80px; width:80px;">
                            <h5 class="pt-1 pb-1"><?php echo $restaurant_name; ?></h4>
                        <?php
                        }?>

                        <?php
                            $query2 = "select cost_of_item,item_name,item_quentity from allitemsoforders where order_id=$order_id";
                            $result2 = mysqli_query($con,$query2);
                            $order_cost = 0;
                            while($row = mysqli_fetch_assoc($result2)){
                                $item_cost = $row['cost_of_item'];
                                $item_name = $row['item_name'];
                                $item_quentity = $row['item_quentity'];
                                $order_cost += $item_cost;?>
                                <h6 class="pb-1"><span class=" rounded-1" style="background-color:#ffffff; padding:1px; padding-left:2px; padding-right:2px;"><?php echo $item_quentity; ?></span> <?php echo $item_name; ?> <span class="ps-4 ">Cost: $<?php echo $item_cost; ?></span></h6>
                            <?php
                            }
                        ?>

                </div>
                <div class="id d-flex flex-row justify-content-between mt-auto">
                    <h5>Total:$<?php echo $order_cost; ?></h5>
                </div>
            </div>
            
            <?php
        
        }
    }

    function confirmation($user_id){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $sql = "select * from orders where user_id=$user_id ORDER BY order_id DESC LIMIT 1";
        $result = mysqli_query($con,$sql);?>


        <div class="carddd d-flex flex-column">
            <div class="d-flex flex-row justify-content-between mb-2">
                <div>
                    <h3>Thanks for shopping</h3>
                    <h2>Your Order Was Sent!</h2>
                </div>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $order_id = $row['order_id'];
                    $order_cost = $row['total_cost'];
                    $restaurant_id = $row['restaurant_id'];?>

                    
                <h6 style="font-size:19px; color:#a8acaf;" class="pe-5"><i class="fa-solid fa-id-badge pe-1"></i> Order id #<?php echo $order_id; ?></h6>
            </div>
                    <?php
                    $query = "select * from restaurants where restaurant_id=$restaurant_id";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($result)){
                        $restaurant_name = $row['restaurant_name'];
                        $restaurant_des = $row['restaurant_des'];
                        $restaurant_image = $row['restaurant_image'];?>

                    

            <div class="d-flex flex-row align-items-center">
                <img class="logo me-3" src="<?php echo $restaurant_image; ?>" alt="">
                <div>
                    <h4 class="pb-2"><?php echo $restaurant_name; ?></h4>
                    <h4><?php echo $restaurant_des; ?></h4>
                </div>
            </div>
            <?php
            }?>
                    
            <div class="mt-4">
                <table class="table table-dark table-hover">
                    <tr>
                        <th>item_name</th>
                        <th>item_cost</th>
                        <th>item_quentity</th>
                    </tr>
                    <?php
                    $query1 = "select * from allitemsoforders where order_id=$order_id";
                    $result1 = mysqli_query($con,$query1);
                    while($row = mysqli_fetch_assoc($result1)){
                        $item_cost = $row['cost_of_item'];
                        $item_name = $row['item_name'];
                        $item_quentity = $row['item_quentity'];?>


                    <tr>
                        <td><?php echo $item_name; ?></td>
                        <td>$<?php echo $item_cost; ?></td>
                        <td><?php echo $item_quentity; ?></td>
                    </tr>
                    <?php
                    }
                }?>
                </table>
                <h3>Total: $<?php echo $order_cost; ?></h3>
            </div>
            <a href="user_main_page.php" class="btn btn-danger rounded-4 mt-auto text-end" style="width:fit-content;">countinue shopping</a>
        </div>

        <?php
        
    }

    function showoffers(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from offers order by offer_id desc limit 1";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
        $item = $row['offer_item'];
        $cost = $row['offer_cost'];
        $des = $row['offer_des'];
        $restaurant_id = $row['restaurant_id'];

        $sql = "select * from restaurants where restaurant_id=$restaurant_id";
        $result1 = mysqli_query($con,$sql);
        $row1 = mysqli_fetch_assoc($result1);
        $restaurant_image = $row1['restaurant_image'];?>

        <h2>spical offers</h2>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $restaurant_image; ?>" class="img-fluid rounded-start h-100" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item; ?></h5>
                        <p class="card-text"><?php echo $des; ?></p>
                        <p class="card-text"><small class="text-body-secondary">$<?php echo $cost; ?></small></p>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}