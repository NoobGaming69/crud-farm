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
                        <h4>Update Cultural Heritage
                            <a href="cultural_heritage.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['cultural_heritage_id'])) {
                            $cultural_heritage_id = pg_escape_string($con, $_GET['cultural_heritage_id']);
                            $query = "SELECT * FROM cultural_heritage WHERE cultural_heritage_id='$cultural_heritage_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $cultural_heritage = pg_fetch_assoc($query_run);
                                $current_tribe_id = $cultural_heritage['tribe_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="cultural_heritage_id" value="<?= $cultural_heritage_id; ?>">

                                    <div class="mb-3">
                                        <select name="tribe_id">
                                            <?php
                                            // PHP code to display available schedules from the database
                                            // Query to select all available schedules in the database
                                            $query2 = "SELECT * FROM tribe";

                                            // Executing query
                                            $query_run2 = pg_query($con, $query2);

                                            // Count rows to check whether we have a schedule or not
                                            $count2 = pg_num_rows($query_run2);

                                            // If count is greater than 0, we have a schedule; else, we do not have a schedule
                                            if ($count2 > 0) {
                                                // We have a schedule
                                                while ($row2 = pg_fetch_assoc($query_run2)) {
                                                    // Get the details of the schedule
                                                    $tribe_id = $row2['tribe_id'];
                                                    $name = $row2['name'];

                                            ?>
                                                    <option <?php if ($current_tribe_id == $tribe_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $tribe_id; ?>"><?php echo $name; ?></option>
                                                <?php
                                                }
                                            } else {
                                                // We do not have a schedule
                                                ?>
                                                <option value="0">No tribe name Found</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label> Preservation of Cultural Heritage </label>
                                        <input type="text" name="preservation_of_cultural_heritage" value="<?= $cultural_heritage['preservation_of_cultural_heritage']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Economic Development </label>
                                        <input type="text" name="economic_development" value="<?= $cultural_heritage['economic_development']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> History Culture </label>
                                        <input type="text" name="history_culture" value="<?= $cultural_heritage['history_culture']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_cultural_heritage" class="btn btn-primary">Update Cultural History</button>
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