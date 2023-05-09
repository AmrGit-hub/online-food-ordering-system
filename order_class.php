<?php
require_once("cart_class.php");



class order{
    public $cart;
    private $order_id;
    private $order_date;
    private $user_id;
    private $user_name;
    private $order_status;
    private $paid;
    
    
    function make_reset($order_id){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";

        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $this->cart = new cart();
        $user_address = $_SESSION['useraddress'];
        $phone_number = $_SESSION['phonenumber'];
        $restaurant_id = $_SESSION['restaurant_id'];
        $user_id = $_SESSION['user_id'];
        $user_name = $_SESSION['user_name'];
        $totalcost = $this->cart->calc_total_price_ofcartitems($order_id);
        date_default_timezone_set("Africa/Cairo");
        $order_date = date("Y-m-d H:i:s");

        $sql1 = "insert into payment(user_id,amount,order_id,user_name,phone_number,user_address) values($user_id,$totalcost,$order_id,'$user_name',$phone_number,'$user_address')";
        mysqli_query($con,$sql1);

        $sql2 = "insert into orders(order_id,user_id,user_name,order_status,restaurant_id,order_date,total_cost,paid) values($order_id,$user_id,'$user_name','preparing',$restaurant_id,'$order_date',$totalcost,'true')";
        mysqli_query($con,$sql2);

        $sql3 = "select * from orderitems where order_id=$order_id";
        $result = mysqli_query($con,$sql3);
        while($row = mysqli_fetch_assoc($result)){
            $order_id = $row['order_id'];
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];
            $item_quentity = $row['item_quentity'];
            $item_image = $row['item_image'];
            $cost_of_item = $row['cost_of_item'];
            $item_description = $row['item_description'];

            $sql4 = "insert into allitemsoforders(cost_of_item,item_description,item_id,item_image,item_name,item_quentity,order_id) values($cost_of_item,'$item_description',$item_id,'$item_image','$item_name',$item_quentity,$order_id)";
            mysqli_query($con,$sql4);
        }

        $sql5 = "TRUNCATE orderitems";
        mysqli_query($con,$sql5);

        header("location:aftercheckout.php");
        exit();
    }
}