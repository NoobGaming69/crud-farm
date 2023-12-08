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
                        <h4>Traditional Usage Details
                            <a href="traditional_usage.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['traditional_usage_id'])) {
                            $traditional_usage_id = pg_escape_string($con, $_GET['traditional_usage_id']);
                            $query = "SELECT traditional_usage.*, crops.crop_name
                            FROM traditional_usage
                            JOIN crops ON traditional_usage.crop_id = crops.crop_id where traditional_usage_id='$traditional_usage_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $traditional_usage = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Arts and Languages ID </label>
                                    <p class="form-control"><?= $traditional_usage['traditional_usage_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $traditional_usage['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Culinary Application </label>
                                    <p class="form-control"><?= $traditional_usage['culinary_application']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Medicinal Usage</label>
                                    <p class="form-control"><?= $traditional_usage['medicinal_usage']; ?></p>
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