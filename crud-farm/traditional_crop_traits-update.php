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
                        <h4>Traditional Crop Traits
                            <a href="traditional_crop_traits.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['traditional_crop_traits_id'])) {
                            $traditional_crop_traits_id = pg_escape_string($con, $_GET['traditional_crop_traits_id']);
                            $query = "SELECT * FROM traditional_crop_traits WHERE traditional_crop_traits_id='$traditional_crop_traits_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $traditional_crop_traits = pg_fetch_assoc($query_run);
                                $current_crop_id = $traditional_crop_traits['crop_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="traditional_crop_traits_id" value="<?= $traditional_crop_traits_id; ?>">

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
                                        <label> Flavor </label>
                                        <input type="text" name="flavor" value="<?= $traditional_crop_traits['flavor']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Scent </label>
                                        <input type="text" name="scent" value="<?= $traditional_crop_traits['scent']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Maturation </label>
                                        <input type="text" name="maturation" value="<?= $traditional_crop_traits['maturation']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Drought Tolerance </label>
                                        <input type="text" name="drought_tolerance" value="<?= $traditional_crop_traits['drought_tolerance']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Environment Adaptability </label>
                                        <input type="text" name="environment_adaptability" value="<?= $traditional_crop_traits['environment_adaptability']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Culinary Quality </label>
                                        <input type="text" name="culinary_quality" value="<?= $traditional_crop_traits['culinary_quality']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Nutritional Value </label>
                                        <input type="text" name="nutritional_value" value="<?= $traditional_crop_traits['nutritional_value']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_traditional_crop_traits" class="btn btn-primary">Update Traditional Crop Traits</button>
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