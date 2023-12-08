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
                        <h4>Add Traditional Crop Traits
                            <a href="traditional_crop_traits.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["crop_id"].value;
                                var b = document.forms["Form"]["flavor"].value;
                                var c = document.forms["Form"]["scent"].value;
                                var c = document.forms["Form"]["maturation"].value;
                                var c = document.forms["Form"]["drought_tolerance"].value;
                                var c = document.forms["Form"]["environment_adaptability"].value;
                                var c = document.forms["Form"]["culinary_quality"].value;
                                var c = document.forms["Form"]["nutritional_value"].value;


                                if (a == null || a == "", b == null || b == "", c == null || c == "") {
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
                                            // get the detail of the crop
                                            $crop_id = $row['crop_id'];
                                            $crop_name = $row['crop_name'];
                                    ?>
                                            <option value="<?php echo $crop_id; ?>"><?php echo $crop_name; ?></option>
                                        <?php
                                        }
                                    } else {
                                        // we do not have a crop
                                        ?>
                                        <option value="0">No crop name Found</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label> Flavor </label>
                                <input type="text" name="flavor" placeholder="Enter Flavor" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Scent </label>
                                <input type="text" name="scent" placeholder="Enter Scent" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Maturation </label>
                                <input type="text" name="maturation" placeholder="Enter Maturation" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Drought Tolerance </label>
                                <input type="text" name="drought_tolerance" placeholder="Enter Drought Tolerance" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Environment Adaptability </label>
                                <input type="text" name="environment_adaptability" placeholder="Enter Environment Adaptability" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Culinary Quality </label>
                                <input type="text" name="culinary_quality" placeholder="Enter Culinary Quality" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Nutritional Value </label>
                                <input type="text" name="nutritional_value" placeholder="Enter Nutritional Value" class="form-control">
                            </div>


                            <div class="mb-3">
                                <button type="submit" name="save_traditional_crop_traits" class="btn btn-primary">Save Traditional Crop Traits</button>
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