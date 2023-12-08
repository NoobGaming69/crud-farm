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
                        <h4>Crop Cultural Significance Details
                            <a href="crop_cultural_significance.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['cultural_significance_id'])) {
                            $cultural_significance_id = pg_escape_string($con, $_GET['cultural_significance_id']);
                            $query = "SELECT crop_cultural_significance.*, crops.crop_name
                            FROM crop_cultural_significance
                            JOIN crops ON crop_cultural_significance.crop_id = crops.crop_id where cultural_significance_id='$cultural_significance_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $crop_cultural_significance = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Arts and Languages ID </label>
                                    <p class="form-control"><?= $crop_cultural_significance['cultural_significance_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $crop_cultural_significance['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Historical Context and Traditional Knowledge </label>
                                    <p class="form-control"><?= $crop_cultural_significance['historical_context_and_traditional_knowledge']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Role in Local Cuisine and Customs</label>
                                    <p class="form-control"><?= $crop_cultural_significance['role_in_local_cuisine_and_customs']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Cultural Values and Beliefs Associated with Traditional Crop</label>
                                    <p class="form-control"><?= $crop_cultural_significance['cultural_values_and_beliefs_associated_with_traditional_crop']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Cultural and Spiritual Significance</label>
                                    <p class="form-control"><?= $crop_cultural_significance['cultural_and_spiritual_significance']; ?></p>
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