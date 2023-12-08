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
                        <h4>Cultural Heritage Details
                            <a href="cultural_heritage.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['cultural_heritage_id'])) {
                            $cultural_heritage_id = pg_escape_string($con, $_GET['cultural_heritage_id']);
                            $query = "SELECT cultural_heritage.*, tribe.name
                            FROM cultural_heritage
                            JOIN tribe ON cultural_heritage.tribe_id = tribe.tribe_id where cultural_heritage_id=$cultural_heritage_id";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $cultural_heritage = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Cultural Heritage ID </label>
                                    <p class="form-control"><?= $cultural_heritage['cultural_heritage_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Tribe Name </label>
                                    <p class="form-control"><?= $cultural_heritage['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Preservation of Cultural Heritage </label>
                                    <p class="form-control"><?= $cultural_heritage['preservation_of_cultural_heritage']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Economic Development</label>
                                    <p class="form-control"><?= $cultural_heritage['economic_development']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>History and Culture</label>
                                    <p class="form-control"><?= $cultural_heritage['history_culture']; ?></p>
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