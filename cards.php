

<?php
// session_start();
ob_start();
require "./database.php";

if (isset($_POST["delete"])) {
  require "./delete.php";
}
if(isset($_POST["update"]))
{
  $_SESSION['updateno']=$_POST["update"];
  echo $_SESSION['updateno'];
  header("Location: update.php");
}



if (isset($_SESSION["user"])) {
  $id = $_SESSION["user"];
  $sql = "SELECT  `id`,`title`,`content`,`date` FROM `data` WHERE `user_id`= $id";
  $result = mysqli_query($conn, $sql);
  $numrows = mysqli_num_rows($result);

  echo '<h1 class="pt-2">Yours notes: </h1>';

  if ($numrows == 0) {
    echo '<div class="alert alert-primary" role="alert">
   No notes are found! you can add notes by clicking add button
   </div>';
  } else {
    echo '<p class="fw-bold pt-2">Total Notes : ' . $numrows . '</p>';
    echo '<div class="container-fluid">
                  <div class="row">';
    while ($fetch = mysqli_fetch_array($result)) {
      //echo $fetch["title"]."</br>";

      echo '
            
                     <div class="col-sm-4 py-2">
                    <div class="card h-100 border-dark">
                    <div class="card-body">
                        <h3 class="card-title text-truncate">' . $fetch["title"] . '</h3>
                        
                        <p class="card-text text-truncate">' . $fetch["content"] . '</p>
                        <form  method="post">
                            <div class="form-btn">
                                
                                 
                                 <button type="submit" name="update" value="' . $fetch["id"] . '" class="btn btn-success">update</button>
                                 <button type="submit" name="delete" value="' . $fetch["id"] . '" class="btn btn-danger">Delete</button>
                            </div>
                            
                        </form>
                       <p class="fw-bold pt-2">Date & Time : ' . $fetch["date"] . '</p>
                    </div>

                </div>

            </div>
            
            

        ';
    }
    echo '</div>
       </div>';
  }
}

echo '';

?>




