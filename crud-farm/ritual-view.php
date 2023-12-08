<?php
require 'connection/connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>View</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ritual Details
                            <a href="ritual.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['ritual_id'])) {
                            $ritual_id = pg_escape_string($con, $_GET['ritual_id']);
                            $query = "SELECT ritual.*, tribe.name
                            FROM ritual
                            JOIN tribe ON ritual.tribe_id = tribe.tribe_id where ritual_id=$ritual_id";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $ritual = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> ritual ID </label>
                                    <p class="form-control"><?= $ritual['ritual_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Tribe Name </label>
                                    <p class="form-control"><?= $ritual['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> ritual Name </label>
                                    <p class="form-control"><?= $ritual['ritual_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Description </label>
                                    <p class="form-control"><?= $ritual['ritual_purpose']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <p class="form-control"><?= $ritual['ritual_timing']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Planting ritual</label>
                                    <p class="form-control"><?= $ritual['ritual_participants']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Post Harvest ritual</label>
                                    <p class="form-control"><?= $ritual['ritual_items']; ?></p>
                                </div>
                        <?php
                            } else {
                                echo "<h4>No ID Found</h4>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>