<?php
header('Content-Type:application/vnd.ms-word');
header('Content-Disposition:attachment;filename=order_report.doc');



$dlocalhost = "localhost";
$duser = "root";
$dpassword = "";
$dname = "food_online_system";
$con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
if (!$con) {
    die("Connection failed");
}

$query="select * from orders";
$result = mysqli_query($con,$query);?>

 O_id  U_id  U_name    O_status     R_id    O_date              Totalcost
<?php
while($row = mysqli_fetch_assoc($result)){
    $order_id = $row['order_id'];
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $order_status = $row['order_status'];
    $restaurant_id = $row['restaurant_id'];
    $order_date = $row['order_date'];
    $totalcost = $row['total_cost'];?>

    
    <?php echo $order_id; ?>   <?php echo $user_id; ?>   <?php echo $user_name; ?>    <?php echo $order_status; ?>     <?php echo $restaurant_id; ?>     <?php echo $order_date; ?>     $<?php echo $totalcost; ?>
    
<?php
}