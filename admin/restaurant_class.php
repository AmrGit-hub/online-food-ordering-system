<?php

class admin_restaurant{

    function add_restaurant($rname,$rdes,$rstatus,$rimage){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "insert into restaurants(restaurant_name,restaurant_image,restaurant_status,restaurant_des) values('$rname','$rimage','$rstatus','$rdes')";
        mysqli_query($con,$query);
    }

    function update_restaurant_name($realrname,$rname){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update restaurants set restaurant_name='$rname' where restaurant_name='$realrname'";
        mysqli_query($con,$query);
    }

    function update_restaurant_status($realrname,$rstatus){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update restaurants set restaurant_status='$rstatus' where restaurant_name='$realrname'";
        mysqli_query($con,$query);
    }

    function update_restaurant_image($realrname,$rimage){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update restaurants set restaurant_image='$rimage' where restaurant_name='$realrname'";
        mysqli_query($con,$query);
    }

    function update_restaurant_des($realrname,$rdes){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update restaurants set restaurant_des='$rdes' where restaurant_name='$realrname'";
        mysqli_query($con,$query);
    }

    function remove_restaurant($rname){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "delete from restaurants where restaurant_name='$rname'";
        mysqli_query($con,$query);
    }
}