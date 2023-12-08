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
                        <h4>Morphological Characteristic Details
                            <a href="morphological_characteristic.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['morphological_characteristic_id'])) {
                            $morphological_characteristic_id = pg_escape_string($con, $_GET['morphological_characteristic_id']);
                            $query = "SELECT morphological_characteristic.*, crops.crop_name
                            FROM morphological_characteristic
                            JOIN crops ON morphological_characteristic.crop_id = crops.crop_id where morphological_characteristic_id='$morphological_characteristic_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $morphological_characteristic = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Morphological Characteristics ID </label>
                                    <p class="form-control"><?= $morphological_characteristic['morphological_characteristic_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $morphological_characteristic['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Plaant Height </label>
                                    <p class="form-control"><?= $morphological_characteristic['plant_height']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Panicle Height</label>
                                    <p class="form-control"><?= $morphological_characteristic['panicle_length']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Grain Quality</label>
                                    <p class="form-control"><?= $morphological_characteristic['grain_quality']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Grain Color</label>
                                    <p class="form-control"><?= $morphological_characteristic['grain_color']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Grain Length</label>
                                    <p class="form-control"><?= $morphological_characteristic['grain_length']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Grain Width</label>
                                    <p class="form-control"><?= $morphological_characteristic['grain_width']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Garin Shape</label>
                                    <p class="form-control"><?= $morphological_characteristic['grain_shape']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Awn Length</label>
                                    <p class="form-control"><?= $morphological_characteristic['awn_length']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Leaf Length</label>
                                    <p class="form-control"><?= $morphological_characteristic['leaf_length']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Leaf Width</label>
                                    <p class="form-control"><?= $morphological_characteristic['leaf_width']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Leaf Shape</label>
                                    <p class="form-control"><?= $morphological_characteristic['leaf_shape']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Stem Color</label>
                                    <p class="form-control"><?= $morphological_characteristic['stem_color']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Another Color</label>
                                    <p class="form-control"><?= $morphological_characteristic['another_color']; ?></p>
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