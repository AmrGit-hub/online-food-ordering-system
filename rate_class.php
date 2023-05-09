<?php


class rate{
    private static $obj = null;

    private final function __construct() {
    }

    public static function showinstance() {
        if (!isset(self::$obj)) {
            self::$obj = new rate();
        }
         
        return self::$obj;
    }

    function reseive_rate($restaurant_id){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }
        if(isset($_POST['sendrate'])){
            $rate = $_POST['rate'];
            $user_id = $_SESSION['user_id'];
            $sql = "insert into ratings(rate,user_id,restaurant_id) values('$rate',$user_id,$restaurant_id)";
            mysqli_query($con,$sql);
        }
        ?>

        <form class="form-floating mb-3 mt-3 d-flex flex-row" method="post">
            <input class="form-control w-75 me-4" placeholder="Leave a comment here" type="text" name="rate" id="floatingTextareaDisabled">
            <label for="floatingTextareaDisabled">Comments</label>
            <input class="btn btn-secondary" type="submit" value="Rate" name="sendrate">
        </form>

    <?php
    }
}