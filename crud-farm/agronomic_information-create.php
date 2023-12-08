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

    <title>Create</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Agronomic Information
                            <a href="agronomic_information.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var b = document.forms["Form"]["crop_id"].value;
                                var c = document.forms["Form"]["days_to_mature"].value;
                                var d = document.forms["Form"]["yield_potential"].value;
                                var e = document.forms["Form"]["pest_and_disease_resistance"].value;

                                if (b == null || b == "", c == null || c == "",
                                    d == null || d == "", e == null || e == "") {
                                    alert("Please Fill In All Required Details");
                                    return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Crop Name </label>
                                <select name="crop_id">
                                    <?php
                                    // php code to display available schedules from the database
                                    // query to select all available schedules in the database
                                    $query = "SELECT * FROM crops";

                                    // Executing query
                                    $query_run = pg_query($con, $query);

                                    // count rows to check whether we have a schedule or not
                                    $count = pg_num_rows($query_run);

                                    // if count is greater than 0 we have a schedule else we do not have a schedule
                                    if ($count > 0) {
                                        // we have a schedule
                                        while ($row = pg_fetch_assoc($query_run)) {
                                            // get the detail of the schedule
                                            $crop_id = $row['crop_id'];
                                            $crop_name = $row['crop_name'];
                                    ?>
                                            <option value="<?php echo $crop_id; ?>"><?php echo $crop_name; ?></option>
                                        <?php
                                        }
                                    } else {
                                        // we do not have a schedule
                                        ?>
                                        <option value="0">No crop name Found</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label> Days to Mature </label>
                                <input type="text" name="days_to_mature" placeholder="Enter Days to Mature" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Yield Potential </label>
                                <input type="text" name="yield_potential" placeholder="Enter Yield Potential" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Pest and Disease Resistance </label>
                                <input type="text" name="pest_and_disease_resistance" placeholder="Enter Pest and Disease Resistance" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_agronomic_information" class="btn btn-primary">Save Agronomic Information</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>