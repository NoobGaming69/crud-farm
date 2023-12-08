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
                        <h4>Update Practice
                            <a href="practice.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['practice_id'])) {
                            $practice_id = pg_escape_string($con, $_GET['practice_id']);
                            $query = "SELECT * FROM practice WHERE practice_id='$practice_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $practice = pg_fetch_assoc($query_run);
                                $current_tribe_id = $practice['tribe_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="practice_id" value="<?= $practice_id; ?>">

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
                                        <label> Practice Name </label>
                                        <input type="text" name="practice_name" value="<?= $practice['practice_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Description </label>
                                        <input type="text" name="description" value="<?= $practice['description']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Image </label>
                                        <input type="text" name="image" value="<?= $practice['image']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Planting Practice </label>
                                        <input type="text" name="planting_practice" value="<?= $practice['planting_practice']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Post Harvest Practice </label>
                                        <input type="text" name="post_harvest_practice" value="<?= $practice['post_harvest_practice']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Pest Control </label>
                                        <input type="text" name="pest_control" value="<?= $practice['pest_control']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Tools or Equipment </label>
                                        <input type="text" name="tools_or_equipment" value="<?= $practice['tools_or_equipment']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Cultural Significance </label>
                                        <input type="text" name="cultural_significance" value="<?= $practice['cultural_significance']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Definition and Characteristics </label>
                                        <input type="text" name="definition_and_characteristics" value="<?= $practice['definition_and_characteristics']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Length of Practice Period </label>
                                        <input type="text" name="length_of_practice_period" value="<?= $practice['length_of_practice_period']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Intervention and Alternatives </label>
                                        <input type="text" name="intervention_and_alternatives" value="<?= $practice['intervention_and_alternatives']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Challenges and Sustainability of this Practice </label>
                                        <input type="text" name="challenges_and_sustainability_of_this_practice" value="<?= $practice['challenges_and_sustainability_of_this_practice']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_practice" class="btn btn-primary">Update Practice</button>
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