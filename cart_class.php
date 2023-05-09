<?php
session_start();


class cart{
    private $cart_id;
    private $order_id;
    private $item_name;
    private $quentity;
    private $item_cost;

    function add_and_remove_and_update_itemscart(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }
        
        $order_id = $_SESSION['order_id'];
        $query = "select * from orderitems where order_id = $order_id";
        $result = mysqli_query($con,$query);
        if(mysqli_num_rows($result) == 0){
            $num = 0;
            $_SESSION['cart_num'] = $num;
        }
        else{
            $num = mysqli_num_rows($result);
            $_SESSION['cart_num'] = $num;
        }
        if(mysqli_num_rows($result)>0){
            if(isset($_POST['remove'])){
                $item_id = $_POST['item_id']; 

                $sql = "delete FROM orderitems WHERE item_id=$item_id"; 
                mysqli_query($con,$sql);

                header("location: ".$_SERVER['REQUEST_URI']);
            }

            if(isset($_POST['increase'])){
                $item_id = $_POST['item_id'];
                $item_quentity = $_POST['item_quentity'];
                $item_quentity += 1;
                $query = "update orderitems SET item_quentity=$item_quentity WHERE item_id=$item_id";
                mysqli_query($con,$query);

                $sql1 = "select * from items where item_id=$item_id";
                $result = mysqli_query($con,$sql1);
                while($row = mysqli_fetch_assoc($result)){
                    $item_cost = $row['item_cost'];
                    $totalcost = $item_cost*$item_quentity;
                    $sql2 = "update orderitems SET cost_of_item=$totalcost WHERE item_id=$item_id";
                    mysqli_query($con,$sql2);
                }
                header("location: ".$_SERVER['REQUEST_URI']);
                
            }
            
            if(isset($_POST['decrease'])){
                if($_POST['item_quentity']>0){
                    $item_id = $_POST['item_id'];
                    $item_quentity = $_POST['item_quentity'];
                    $item_quentity -= 1;
                    $query = "update orderitems SET item_quentity=$item_quentity WHERE item_id=$item_id";
                    mysqli_query($con,$query);
                    
                    $sql1 = "select * from items where item_id=$item_id";
                    $result = mysqli_query($con,$sql1);
                    while($row = mysqli_fetch_assoc($result)){
                        $item_cost = $row['item_cost'];
                        $totalcost = $item_cost*$item_quentity;
                        $sql2 = "update orderitems SET cost_of_item=$totalcost WHERE item_id=$item_id";
                        mysqli_query($con,$sql2);
                    }
                    header("location: ".$_SERVER['REQUEST_URI']);
                    
                }
                else{
                    $item_id = $_POST['item_id'];
                    $query = "update orderitems SET item_quentity=0 WHERE item_id=$item_id";
                    mysqli_query($con,$query);
                }        
            }


            while($rows = mysqli_fetch_assoc($result)){
                $order_id = $rows['order_id'];
                $item_id = $rows['item_id'];
                $item_name = $rows['item_name'];
                $item_quentity = $rows['item_quentity'];
                $item_image = $rows['item_image'];
                $item_cost = $rows['cost_of_item'];
                $item_des = $rows['item_description'];?>

                <tr class="border-bottom">
                    <td class="p-3 py-4 pe-5">
                        <div class="d-flex flex-column">
                            <h4><?php echo $item_name ?></h4>
                            <h6 style="color:#a8acaf;"><?php echo $item_des ?></h6>
                        </div>
                    </td>
                    <td class="p-3 py-4 pe-5 text-end"><?php echo $item_quentity ?></td>
                    <td class="p-3 py-4 pe-5 text-end"><?php echo $item_cost ?>$</td>
                    <td class="p-3 py-4 pe-5 text-end">
                        <form action="" method="POST">
                            <input class="btn btn-secondary border-0" style="background-color:#fdcb46;" type="submit" name="remove" value="Remove">
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                        </form>
                    </td>
                    <td class="p-3 py-4 pe-3 text-end">
                        <form action="" method="POST">
                            <input class="btn btn-secondary border-0" style="background-color:#fdcb46;" type="submit" name="increase" value="increase">
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                            <input type="hidden" name="item_quentity" value="<?php echo $item_quentity; ?>">
                        </form>
                    </td>
                    <td class="p-3 py-4 text-end">
                        <form action="" method="POST">
                            <input class="btn btn-secondary border-0" style="background-color:#fdcb46;" type="submit" name="decrease" value="decrease">
                            <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                            <input type="hidden" name="item_quentity" value="<?php echo $item_quentity; ?>">
                        </form>
                    </td>
                </tr>
            <?php
            }
        }
    }


    function calc_total_price_ofcartitems($order_id){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }
        
        
        $query = "select * from orderitems where order_id = $order_id";
        $result = mysqli_query($con,$query);
        $total_cost = 0;
        while($row = mysqli_fetch_assoc($result)){
            $total_cost += $row['cost_of_item'];
        }
        return $total_cost;
    }
}