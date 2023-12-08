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
                        <h4>Add Crop Cultural Significance
                            <a href="crop_cultural_significance.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["crop_id"].value;
                                var b = document.forms["Form"]["historical_context_and_traditional_knowledge"].value;
                                var c = document.forms["Form"]["role_in_local_cuisine_and_customs"].value;
                                var d = document.forms["Form"]["cultural_values_and_beliefs_associated_with_traditional_crop"].value;
                                var e = document.forms["Form"]["cultural_and_spiritual_significance"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "",
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
                                        <option value="0">No tribe name Found</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label> Historical Context and Traditional Knowledge </label>
                                <input type="text" name="historical_context_and_traditional_knowledge" placeholder="Enter Historical Context and Traditional Knowledge" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Role in Local Cuisine and Customs </label>
                                <input type="text" name="role_in_local_cuisine_and_customs" placeholder="Enter Role in Local Cuisine and Customs" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Cultural Values and Beliefs Associated with Traditional Crop </label>
                                <input type="text" name="cultural_values_and_beliefs_associated_with_traditional_crop" placeholder="Enter Cultural Values and Beliefs Associated with Traditional Crop" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Cultural and Spiritual Significance </label>
                                <input type="text" name="cultural_and_spiritual_significance" placeholder="Enter Cultural and Spiritual Significance" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_crop_cultural_significance" class="btn btn-primary">Save Crop Cultural Significance</button>
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