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
                        <h4>Common Usage
                            <a href="common_usage.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['usage_id'])) {
                            $usage_id = pg_escape_string($con, $_GET['usage_id']);
                            $query = "SELECT * FROM common_usage WHERE usage_id='$usage_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $common_usage = pg_fetch_assoc($query_run);
                                $current_crop_id = $common_usage['crop_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="usage_id" value="<?= $usage_id; ?>">

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
                                        <label> Usage Name </label>
                                        <input type="text" name="usage_name" value="<?= $common_usage['usage_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Description </label>
                                        <input type="text" name="description" value="<?= $common_usage['description']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Image </label>
                                        <input type="text" name="image" value="<?= $common_usage['image']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Usage Example </label>
                                        <input type="text" name="usage_example" value="<?= $common_usage['usage_example']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_common_usage" class="btn btn-primary">Update Common sage</button>
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