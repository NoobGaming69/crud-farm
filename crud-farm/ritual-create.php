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
                        <h4>Add Ritual
                            <a href="ritual.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["ritual_id"].value;
                                var b = document.forms["Form"]["tribe_id"].value;
                                var c = document.forms["Form"]["ritual_name"].value;
                                var d = document.forms["Form"]["ritual_purpose"].value;
                                var e = document.forms["Form"]["ritual_timing"].value;
                                var f = document.forms["Form"]["ritual_participants"].value;
                                var g = document.forms["Form"]["ritual_items"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "",
                                    d == null || d == "", e == null || e == "", f == null || f == "",
                                    g == null || g == "") {
                                    return false;
                                    alert("Please Fill In All Required Details");
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Tribe Name </label>
                                <select name="tribe_id">
                                    <?php
                                    // php code to display available schedules from the database
                                    // query to select all available schedules in the database
                                    $query = "SELECT * FROM tribe";

                                    // Executing query
                                    $query_run = pg_query($con, $query);

                                    // count rows to check whether we have a schedule or not
                                    $count = pg_num_rows($query_run);

                                    // if count is greater than 0 we have a schedule else we do not have a schedule
                                    if ($count > 0) {
                                        // we have a schedule
                                        while ($row = pg_fetch_assoc($query_run)) {
                                            // get the detail of the schedule
                                            $tribe_id = $row['tribe_id'];
                                            $name = $row['name'];
                                    ?>
                                            <option value="<?php echo $tribe_id; ?>"><?php echo $name; ?></option>
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
                                <label> Tribe Name </label>
                                <input type="text" name="name" placeholder="Enter Tribe Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Ritual Name </label>
                                <input type="text" name="ritual_name" placeholder="Enter Ritual Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Ritual Purpose </label>
                                <input type="text" name="ritual_purpose" placeholder="Enter Ritual Purpose" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Ritual Timing </label>
                                <input type="text" name="ritual_timing" placeholder="Enter Ritual Timing" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Ritual Participants </label>
                                <input type="text" name="ritual_participants" placeholder="Enter Ritual Participants" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Ritual Items </label>
                                <input type="text" name="ritual_items" placeholder="Enter Ritual Items " class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_ritual" class="btn btn-primary">Save Ritual</button>
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