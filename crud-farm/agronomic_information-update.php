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
                        <h4>Update Agronomic Information
                            <a href="agronomic_information.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['agronomic_information_id'])) {
                            $agronomic_information_id = pg_escape_string($con, $_GET['agronomic_information_id']);
                            $query = "SELECT * FROM agronomic_information WHERE agronomic_information_id='$agronomic_information_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $agronomic_information = pg_fetch_assoc($query_run);
                                $current_crop_id = $agronomic_information['crop_id'];
                        ?>

                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="agronomic_information_id" value="<?= $agronomic_information_id; ?>">

                                    <div class="mb-3">
                                        <select name="crop_id">
                                            <?php
                                            // PHP code to display available schedules from the database
                                            // Query to select all available schedules in the database
                                            $query2 = "SELECT * FROM crops";

                                            // Executing query
                                            $query_run2 = pg_query($con, $query2);

                                            // Count rows to check whether we have a schedule or not
                                            $count2 = pg_num_rows($query_run2);

                                            // If count is greater than 0, we have a schedule; else, we do not have a schedule
                                            if ($count2 > 0) {
                                                // We have a schedule
                                                while ($row2 = pg_fetch_assoc($query_run2)) {
                                                    // Get the details of the schedule
                                                    $crop_id = $row2['crop_id'];
                                                    $crop_name = $row2['crop_name'];

                                            ?>
                                                    <option <?php if ($current_crop_id == $crop_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $crop_id; ?>"><?php echo $crop_name; ?></option>
                                                <?php
                                                }
                                            } else {
                                                // We do not have a schedule
                                                ?>
                                                <option value="0">No crop name Found</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label> Days to Mature </label>
                                        <input type="text" name="days_to_mature" value="<?= $agronomic_information['days_to_mature']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Yield Potential </label>
                                        <input type="text" name="yield_potential" value="<?= $agronomic_information['yield_potential']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Pest and Disease Resistance </label>
                                        <input type="text" name="pest_and_disease_resistance" value="<?= $agronomic_information['pest_and_disease_resistance']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_agronomic_information" class="btn btn-primary">Update Agronomic Information</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>No ID Found</h4>";
                            }
                        }

                        pg_free_result($query_run);
                        pg_close($con);
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>