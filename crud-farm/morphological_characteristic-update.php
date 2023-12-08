<?php
session_start();
require 'connection/connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Update</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Morphological Characteristic
                            <a href="morphological_characteristic.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['morphological_characteristic_id'])) {
                            $morphological_characteristic_id = pg_escape_string($con, $_GET['morphological_characteristic_id']);
                            $query = "SELECT * FROM morphological_characteristic WHERE morphological_characteristic_id='$morphological_characteristic_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $morphological_characteristic = pg_fetch_assoc($query_run);
                                $current_crop_id = $morphological_characteristic['crop_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="morphological_characteristic_id" value="<?= $morphological_characteristic_id; ?>">

                                    <div class="mb-3">
                                        <select name="crop_id">
                                            <?php
                                            // PHP code to display available crop from the database
                                            // Query to select all available crop in the database
                                            $query2 = "SELECT * FROM crops";

                                            // Executing query
                                            $query_run2 = pg_query($con, $query2);

                                            // Count rows to check whether we have a crop or not
                                            $count2 = pg_num_rows($query_run2);

                                            // If count is greater than 0, we have a crop; else, we do not have a crop
                                            if ($count2 > 0) {
                                                // We have a schedule
                                                while ($row2 = pg_fetch_assoc($query_run2)) {
                                                    // Get the details of the crop
                                                    $crop_id = $row2['crop_id'];
                                                    $crop_name = $row2['crop_name'];

                                            ?>
                                                    <option <?php if ($current_crop_id == $crop_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $crop_id; ?>"><?php echo $crop_name; ?></option>
                                                <?php
                                                }
                                            } else {
                                                // We do not have a crop
                                                ?>
                                                <option value="0">No crop name Found</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label> Plant Height </label>
                                        <input type="text" name="plant_height" value="<?= $morphological_characteristic['plant_height']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Panicle Length </label>
                                        <input type="text" name="panicle_length" value="<?= $morphological_characteristic['panicle_length']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Grain Quality </label>
                                        <input type="text" name="grain_quality" value="<?= $morphological_characteristic['grain_quality']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Grain Color </label>
                                        <input type="text" name="grain_color" value="<?= $morphological_characteristic['grain_color']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Grain Length </label>
                                        <input type="text" name="grain_length" value="<?= $morphological_characteristic['grain_length']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Grain Width </label>
                                        <input type="text" name="grain_width" value="<?= $morphological_characteristic['grain_width']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Grain Shape </label>
                                        <input type="text" name="grain_shape" value="<?= $morphological_characteristic['grain_shape']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Awn Length </label>
                                        <input type="text" name="awn_length" value="<?= $morphological_characteristic['awn_length']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Leaf Length </label>
                                        <input type="text" name="leaf_length" value="<?= $morphological_characteristic['leaf_length']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Leaf Width </label>
                                        <input type="text" name="leaf_width" value="<?= $morphological_characteristic['leaf_width']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Leaf Shape </label>
                                        <input type="text" name="leaf_shape" value="<?= $morphological_characteristic['leaf_shape']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Stem Color </label>
                                        <input type="text" name="stem_color" value="<?= $morphological_characteristic['stem_color']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Another Color </label>
                                        <input type="text" name="another_color" value="<?= $morphological_characteristic['another_color']; ?>" class="form-control">
                                    </div>


                                    <div class="mb-3">
                                        <button type="submit" name="update_morphological_characteristic" class="btn btn-primary">Update Morphological Characteristic</button>
                                    </div>
                                </form>
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