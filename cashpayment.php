<?php

if(isset($_POST['save'])){

    $_SESSION['useraddress'] = $_POST['useraddress'];
    $_SESSION['phonenumber'] = $_POST['phonenumber'];

}

class cash{
    private $user_id;
    private $amount;
    private $user_name;
    private $user_address;


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
                <label class="form-label" style="color:#1b2136;">User Address:</label>
                <input class="form-control w-100 border border-3 border-dark-subtle " type="text" name="useraddress" placeholder="Enter Your Address" >
                <label class="form-label mt-3" style="color:#1b2136;">Phone Number:</label>
                <input class="form-control w-100 border border-3 border-dark-subtle " type="text" name="phonenumber" placeholder="Enter Your PhoneNumber" >
                <input class="btn btn-secondary w-25 border border-0 mt-3" style="background-color:#fdcb46; margin-left:120px;" type="submit" name="save" value="Save">
            </form>
        </div>

    <?php
    }
}