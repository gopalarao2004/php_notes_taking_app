<?php
// session_start();
ob_start();
if (isset($_SESSION["user"])) {
    if ((isset($_POST["title"])) && (isset($_POST["content"]))) {
        if ((!empty($_POST["title"])) && (!empty($_POST["content"]))) {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $id = $_SESSION["user"];
            $datetime = date("Y-m-d H:i:s");
            require "./database.php";
            $sql = "INSERT INTO `data` (`user_id`, `id`, `title`, `content`, `date`) VALUES ($id, NULL, '$title', '$content', '$datetime');";
            $result = mysqli_query($conn, $sql);
            if (($result)) {
                header("Location: index.php");
            } else {
                header("Location: oops.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" id="name" name="title" class="form-control" required>
        </div>
        <!-- <div class="form-group pt-2">
            <input type="password" placeholder="Enter Password" name="password" class="form-control">
        </div> -->
        <div class="form-group pt-2">
            <label for="exampleFormControlTextarea1" class="form-label">Content:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" required></textarea>
        </div>
        <div class="form-btn p-2">
            <input type="submit" value="Add note" name="login" class="btn btn-primary">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>