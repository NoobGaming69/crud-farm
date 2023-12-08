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
                        <h4>Traditional Crop Traits Details
                            <a href="traditional_crop_traits.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['traditional_crop_traits_id'])) {
                            $traditional_crop_traits_id = pg_escape_string($con, $_GET['traditional_crop_traits_id']);
                            $query = "SELECT traditional_crop_traits.*, crops.crop_name
                            FROM traditional_crop_traits
                            JOIN crops ON traditional_crop_traits.crop_id = crops.crop_id where traditional_crop_traits_id='$traditional_crop_traits_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $traditional_crop_traits = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Traditional Crop Traits ID </label>
                                    <p class="form-control"><?= $traditional_crop_traits['traditional_crop_traits_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $traditional_crop_traits['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Flavor </label>
                                    <p class="form-control"><?= $traditional_crop_traits['flavor']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Scent</label>
                                    <p class="form-control"><?= $traditional_crop_traits['scent']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Maturation</label>
                                    <p class="form-control"><?= $traditional_crop_traits['maturation']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Drought Tolerance</label>
                                    <p class="form-control"><?= $traditional_crop_traits['drought_tolerance']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Environment Adaptability</label>
                                    <p class="form-control"><?= $traditional_crop_traits['environment_adaptability']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Culinary Quality</label>
                                    <p class="form-control"><?= $traditional_crop_traits['culinary_quality']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Nutritional Value</label>
                                    <p class="form-control"><?= $traditional_crop_traits['nutritional_value']; ?></p>
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