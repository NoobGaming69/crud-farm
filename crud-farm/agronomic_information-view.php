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
                        <h4>Agronomic Information Details
                            <a href="agronomic_information.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['agronomic_information_id'])) {
                            $agronomic_information_id = pg_escape_string($con, $_GET['agronomic_information_id']);
                            $query = "SELECT agronomic_information.*, crops.crop_name
                            FROM agronomic_information
                            JOIN crops ON agronomic_information.crop_id = crops.crop_id WHERE agronomic_information_id='$agronomic_information_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $agronomic_information = pg_fetch_assoc($query_run);
                        ?>

                                <div class="mb-3">
                                    <label> Agronomic Information ID </label>
                                    <p class="form-control"><?= $agronomic_information['agronomic_information_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $agronomic_information['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Days to Mature </label>
                                    <p class="form-control"><?= $agronomic_information['days_to_mature']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Yield Potential </label>
                                    <p class="form-control"><?= $agronomic_information['yield_potential']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Pest and Disease Resistance </label>
                                    <p class="form-control"><?= $agronomic_information['pest_and_disease_resistance']; ?></p>
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