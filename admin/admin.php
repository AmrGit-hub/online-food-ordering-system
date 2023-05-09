<?php
session_start();

class admin{
    function admin_login($adminname,$adminpassword){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from admins where admin_name='$adminname'";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['adminname'] = $row['admin_name'];
            $_SESSION['adminid'] = $row['admin_id'];

            header("location:admin_home.php");
            exit();
        }
        else{
            return 'notfound';
        }
    }

    function view_user(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from users";
        $result = mysqli_query($con , $query);

        if(isset($_POST['remove_user'])){
            $user_id = $_POST['user_id'];
            $sql = "delete FROM users WHERE user_id=$user_id";
            mysqli_query($con,$sql);
            header("location: ".$_SERVER['REQUEST_URI']);
        }

        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $fristname = $row['user_fname'];
            $lastname = $row['user_lname'];?>
            
            <tr class="border-bottom">
                <td class="p-3 py-4 pe-5"><?php echo $user_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $fristname; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $lastname; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $user_name; ?></th>
                <td class="p-3 py-4 pe-5 text-end">
                    <form action="" method="POST">
                        <input class="btn btn-secondary border-0" style="background-color:#fdcb46;" type="submit" name="remove_user" value="Remove">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    </form>
                </td>
            </tr>
        <?php
        }
    }

    function view_comment(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from ratings";
        $result = mysqli_query($con , $query);

        if(isset($_POST['remove_rate'])){
            $rate_id = $_POST['rate_id'];
            $sql = "delete FROM ratings WHERE rate_id=$rate_id";
            mysqli_query($con,$sql);
            header("location: ".$_SERVER['REQUEST_URI']);
        }

        while($row = mysqli_fetch_assoc($result)){
            $rate_id = $row['rate_id'];
            $rate = $row['rate'];
            $user_id = $row['user_id'];
            $restaurant_id = $row['restaurant_id'];?>
            
            <tr class="border-bottom">
                <td class="p-3 py-4 pe-5"><?php echo $rate_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $rate; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $user_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $restaurant_id; ?></th>
                <td class="p-3 py-4 pe-5 text-end">
                    <form action="" method="POST">
                        <input class="btn btn-secondary border-0" style="background-color:#fdcb46;" type="submit" name="remove_rate" value="Remove">
                        <input type="hidden" name="rate_id" value="<?php echo $rate_id; ?>">
                    </form>
                </td>
            </tr>
        <?php
        }
    }

    function view_orders(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from orders";
        $result = mysqli_query($con , $query);

        if(isset($_POST['finished'])){
            $order_id = $_POST['order_id'];
            $sql2 = "select order_status from orders where order_id=$order_id";
            $result = mysqli_query($con,$sql2);
            while($row = mysqli_fetch_assoc($result)){
                $order_status = $row['order_status'];
                if($order_status == 'canceled'){
                    header("location: ".$_SERVER['REQUEST_URI']);
                }
                else{
                    $sql = "update orders set order_status='finished' WHERE order_id=$order_id";
                    mysqli_query($con,$sql);
                    header("location: ".$_SERVER['REQUEST_URI']);
                }
            }
        }

        while($row = mysqli_fetch_assoc($result)){
            $order_id = $row['order_id'];
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $order_status = $row['order_status'];
            $restaurant_id = $row['restaurant_id'];
            $order_date = $row['order_date'];
            $totalcost = $row['total_cost'];?>
            
            <tr class="border-bottom">
                <td class="p-3 py-4 pe-5"><?php echo $order_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $user_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $user_name; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $order_status; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $restaurant_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $order_date; ?></th>
                <td class="p-3 py-4 pe-5">$<?php echo $totalcost; ?></th>
                <td class="p-3 py-4 pe-5 text-end">
                    <form action="" method="POST">
                        <input class="btn btn-secondary border-0" style="background-color:#fdcb46;" type="submit" name="finished" value="Done">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                    </form>
                </td>
            </tr>
        <?php
        }
    }

    function add_offer($itemname,$itemcost,$offerdes,$restid){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "insert into offers(offer_item,offer_cost,restaurant_id,offer_des) values('$itemname',$itemcost,$restid,'$offerdes')";
        mysqli_query($con,$query);

        $sql = "update items set item_cost=$itemcost where item_name='$itemname' and restaurant_id=$restid";
        mysqli_query($con,$sql);
    }

    function view_restaurants(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "select * from restaurants";
        $result = mysqli_query($con , $query);

        while($row = mysqli_fetch_assoc($result)){
            $restaurant_id = $row['restaurant_id'];
            $restaurant_name = $row['restaurant_name'];
            $restaurant_status = $row['restaurant_status'];
            $restaurant_des = $row['restaurant_des'];?>
            
            <tr class="border-bottom">
                <td class="p-3 py-4 pe-5"><?php echo $restaurant_id; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $restaurant_name; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $restaurant_status; ?></th>
                <td class="p-3 py-4 pe-5"><?php echo $restaurant_des; ?></th>
            </tr>
        <?php
        }
    }
}