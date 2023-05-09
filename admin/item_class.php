<?php

class admin_item{

    function add_item($iname,$icost,$ides,$rid,$iimage){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "insert into items(item_name,item_cost,item_des,restaurant_id,item_image) values('$iname',$icost,'$ides',$rid,'$iimage')";
        mysqli_query($con,$query);
    }

    function update_item_name($realrid,$realiname,$iname){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update items set item_name='$iname' where item_name='$realiname' and restaurant_id=$realrid";
        mysqli_query($con,$query);
    }

    function update_item_cost($realrid,$realiname,$icost){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update items set item_cost=$icost where item_name='$realiname' and restaurant_id=$realrid";
        mysqli_query($con,$query);
    }

    function update_item_image($realrid,$realiname,$iimage){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update items set item_image='$iimage' where item_name='$realiname' and restaurant_id=$realrid";
        mysqli_query($con,$query);
    }

    function update_item_des($realrid,$realiname,$ides){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "update items set item_des='$ides' where item_name='$realiname' and restaurant_id=$realrid";
        mysqli_query($con,$query);
    }

    function remove_item($iname){
        $dlocalhost = "localhost";
        $duser = "root";
        $dpassword = "";
        $dname = "food_online_system";
        $con = mysqli_connect($dlocalhost,$duser,$dpassword,$dname);
        if (!$con) {
            die("Connection failed");
        }

        $query = "delete from items where item_name='$iname'";
        mysqli_query($con,$query);
    }
}