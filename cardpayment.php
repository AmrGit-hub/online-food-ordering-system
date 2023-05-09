<?php

// session_start();


class card{
    private $user_id;
    private $amount;
    private $card_number;

    function setinformation(){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }?>

        <div class="w-100 mt-4">
            <form action="" method="post">
                <label class="form-label" style="color:#1b2136;">Card Name:</label>
                <input class="form-control w-100 border border-3 border-dark-subtle" type="text" name="cardname" placeholder="Card Name" >
                <label class="form-label mt-3" style="color:#1b2136;">Card Number:</label>
                <input class="form-control w-100 border border-3 border-dark-subtle" type="text" name="cardnum" placeholder="0000-0000-0000-0000" >
                <input class="btn btn-secondary w-25 border border-0 mt-3" style="background-color:#fdcb46; margin-left:120px;" type="submit" name="save" value="Save">
            </form>
        </div>

    <?php
    }
}