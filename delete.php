<?php
  $deleteno=$_POST["delete"];
    $sql="DELETE FROM `data` WHERE `id`=$deleteno";
    $res=mysqli_query($conn,$sql);
    if($res)
    {
       //header("Location: index.php");
    }else{
        header("Location: oops.php");
    }
?>