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
                        <h4>Update Ritual
                            <a href="ritual.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['ritual_id'])) {
                            $ritual_id = pg_escape_string($con, $_GET['ritual_id']);
                            $query = "SELECT * FROM ritual WHERE ritual_id='$ritual_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $ritual = pg_fetch_assoc($query_run);
                                $current_tribe_id = $ritual['tribe_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="ritual_id" value="<?= $ritual_id; ?>">

                                    <div class="mb-3">
                                        <select name="tribe_id">
                                            <?php
                                            // PHP code to display available ritual from the database
                                            // Query to select all available ritual in the database
                                            $query2 = "SELECT * FROM tribe";

                                            // Executing query
                                            $query_run2 = pg_query($con, $query2);

                                            // Count rows to check whether we have a ritual or not
                                            $count2 = pg_num_rows($query_run2);

                                            // If count is greater than 0, we have a ritual; else, we do not have a ritual
                                            if ($count2 > 0) {
                                                // We have a ritual
                                                while ($row2 = pg_fetch_assoc($query_run2)) {
                                                    // Get the details of the ritual
                                                    $tribe_id = $row2['tribe_id'];
                                                    $name = $row2['name'];

                                            ?>
                                                    <option <?php if ($current_tribe_id == $tribe_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $tribe_id; ?>"><?php echo $name; ?></option>
                                                <?php
                                                }
                                            } else {
                                                // We do not have a ritual
                                                ?>
                                                <option value="0">No tribe name Found</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label> ritual Name </label>
                                        <input type="text" name="ritual_name" value="<?= $ritual['ritual_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Ritual Purpose </label>
                                        <input type="text" name="ritual_purpose" value="<?= $ritual['ritual_purpose']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Ritual Timing </label>
                                        <input type="text" name="ritual_timing" value="<?= $ritual['ritual_timing']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Ritual Participants </label>
                                        <input type="text" name="ritual_participants" value="<?= $ritual['ritual_participants']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Ritual Items </label>
                                        <input type="text" name="ritual_items" value="<?= $ritual['ritual_items']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_ritual" class="btn btn-primary">Update Ritual</button>
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