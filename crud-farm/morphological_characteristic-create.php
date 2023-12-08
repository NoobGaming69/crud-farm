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

        <?php 
        include('message.php');
        ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Morphological Characteristic
                            <a href="morphological_characteristic.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["crop_id"].value;
                                var b = document.forms["Form"]["plant_height"].value;
                                var c = document.forms["Form"]["panicle_length"].value;
                                var d = document.forms["Form"]["grain_quality"].value;
                                var e = document.forms["Form"]["grain_color"].value;
                                var f = document.forms["Form"]["grain_length"].value;
                                var g = document.forms["Form"]["grain_width"].value;
                                var h = document.forms["Form"]["grain_shape"].value;
                                var i = document.forms["Form"]["awn_length"].value;
                                var j = document.forms["Form"]["leaf_length"].value;
                                var k = document.forms["Form"]["leaf_width"].value;
                                var l = document.forms["Form"]["leaf_shape"].value;
                                var m = document.forms["Form"]["stem_color"].value;
                                var n = document.forms["Form"]["another_color"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "",
                                e == null || e == "", f == null || f == "", g == null || g == "", h == null || h == "", 
                                i == null || i == "", j == null || j == "", k == null || k == "", l == null || l == "", 
                                m == null || m == "", n == null || n == "") {
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
                                <label> Plant Height </label>
                                <input type="text" name="plant_height" placeholder="Enter Plant Height" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Panicle Length </label>
                                <input type="text" name="panicle_length" placeholder="Enter Panicle Length" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Grain Quality </label>
                                <input type="text" name="grain_quality" placeholder="Enter Grain Quality" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Grain Color </label>
                                <input type="text" name="grain_color" placeholder="Enter Grain Color" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Grain Length </label>
                                <input type="text" name="grain_length" placeholder="Enter Grain Length" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Grain Width </label>
                                <input type="text" name="grain_width" placeholder="Enter Grain Width" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Grain Shape </label>
                                <input type="text" name="grain_shape" placeholder="Enter Grain Shape" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Awn Length </label>
                                <input type="text" name="awn_length" placeholder="Enter Awn Length" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Leaf Length </label>
                                <input type="text" name="leaf_length" placeholder="Enter Medicinal" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Leaf Width </label>
                                <input type="text" name="leaf_width" placeholder="Enter Leaf Width" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Leaf Shape </label>
                                <input type="text" name="leaf_shape" placeholder="Enter Leaf Shape" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Stem Color </label>
                                <input type="text" name="stem_color" placeholder="Enter Stem Color" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Another Color </label>
                                <input type="text" name="another_color" placeholder="Enter Another Color" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_morphological_characteristic" class="btn btn-primary">Save Morphological Characteristic</button>
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