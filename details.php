<?php

require_once "./database.php";
$id = $_SESSION["user"];
$sql = "SELECT `full_name` FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> -->


</head>


<body>
    <div class="container-fluid px-3 border border-10 ">
        <div class="row justify-content-left">
            <div class="col-lg-11 ">
                <div class="jumbotron">
                    <h1 class="display-3">Hello, <?php
                                                    while ($name = mysqli_fetch_array($result)) {
                                                        $name = $name['full_name'];
                                                        echo $name;
                                                    }
                                                    ?></h1>
                    <p class="lead">Thankyou For joining us! this platform offers notes.</p>

                    <p>You can click the add button to add your note.</p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary pb-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Note
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    require './create.php';
                                    ?>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
</body>

</html>