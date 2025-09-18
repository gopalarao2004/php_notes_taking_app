
<?php
session_start();
require_once "./database.php";
 date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION["user"]))
{
    header("Location: login.php");
    exit;
}
$id = $_SESSION["user"];
$sql = "SELECT `full_name` FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

$update_no=$_SESSION["updateno"];
$sql1="SELECT `title`,`content` FROM `data` WHERE `id`=$update_no";
$result1=mysqli_query($conn,$sql1);

while($fetch=mysqli_fetch_array($result1))
{
    $title=$fetch["title"];
    $content=$fetch["content"];
}

if((isset($_POST["updatedtitle"])) && (isset($_POST["updatedcontent"])))
{
    if((!empty($_POST["updatedtitle"])) && (!empty($_POST["updatedcontent"])))
    {
        $updatedtitle=$_POST["updatedtitle"];
        $updatedcontent=$_POST["updatedcontent"];
         $datetime = date("Y-m-d H:i:s");
        $updatequery="UPDATE `data` SET `title` = '$updatedtitle', `content` = '$updatedcontent',`date` = '$datetime' WHERE `data`.`id` = $update_no";
        $updatequeryres=mysqli_query($conn,$updatequery);
        if($updatequeryres)
        {
            header("Location:index.php");
        }else{
            header("Location: oops.php");
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
    <?php
    require_once './navbar.php';
    ?>
     <div class="container-fluid   bg-secondary text-white ">
        <div class="row justify-content-left">
            <div class="col-lg-11 ">
                <div class="jumbotron">
                    <h1 class="display-3">Hello, <?php
                                                    while ($name = mysqli_fetch_array($result)) {
                                                        $name = $name['full_name'];
                                                        echo $name;
                                                    }
                                                   
                                                    ?></h1>
                   

                    <p>You can update your note.</p>

                  
                   

                </div>
            </div>
        </div>
    </div>

    <!-- form  -->

    <form action="" method="post" class="p-4">
        <div class="form-group p-1">
            <label for="name">Title:</label>
            <input type="text" id="name" name="updatedtitle" class="form-control" value="<?php echo $title;?>" required>
        </div>
        <!-- <div class="form-group pt-2">
            <input type="password" placeholder="Enter Password" name="password" class="form-control">
        </div> -->
        <div class="form-group p-1">
            <label for="exampleFormControlTextarea1" class="form-label">Content:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="updatedcontent"  required><?php echo $content;?></textarea>
        </div>
        <div class="form-btn p-1">
            <input type="submit" value="update" name="update" class="btn btn-success">
        </div>
    </form>

</body>
</html>