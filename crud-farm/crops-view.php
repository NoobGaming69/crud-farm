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
                        <h4>Crop Info Details
                            <a href="crops.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['crop_id'])) {
                            $crop_id = pg_escape_string($con, $_GET['crop_id']);
                            $query = "SELECT * FROM crops WHERE crop_id='$crop_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $crops = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Crop Info ID </label>
                                    <p class="form-control"><?= $crops['crop_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $crops['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Scientific Name </label>
                                    <p class="form-control"><?= $crops['scientific_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Variety Name </label>
                                    <p class="form-control"><?= $crops['variety_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Meaning of Name</label>
                                    <p class="form-control"><?= $crops['meaning_of_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <p class="form-control"><?= $crops['description']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>When or How used</label>
                                    <p class="form-control"><?= $crops['when_how_used']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Upland or Lowland</label>
                                    <p class="form-control"><?= $crops['upland_or_lowland']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Season</label>
                                    <p class="form-control"><?= $crops['season']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Conservation Status</label>
                                    <p class="form-control"><?= $crops['conservation_status']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Economic Importance</label>
                                    <p class="form-control"><?= $crops['economic_importance']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Category</label>
                                    <p class="form-control"><?= $crops['category']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Image Link</label>
                                    <p class="form-control"><?= $crops['image']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Links</label>
                                    <p class="form-control"><?= $crops['links']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Preservation Status</label>
                                    <p class="form-control"><?= $crops['preservation_status']; ?></p>
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