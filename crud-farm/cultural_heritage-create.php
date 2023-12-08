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
                        <h4>Add Cultural Heritage
                            <a href="cultural_heritage.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["tribe_id"].value;
                                var b = document.forms["Form"]["preservation_of_cultural_heritage"].value;
                                var c = document.forms["Form"]["economic_development"].value;
                                var d = document.forms["Form"]["history_culture"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "",
                                    d == null || d == "") {
                                    alert("Please Fill In All Required Details");
                                    return false;
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
                                <label> Preservation of Cultural Heritage </label>
                                <input type="text" name="preservation_of_cultural_heritage" placeholder="Enter Preservation of Cultural Heritage" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Economic Development </label>
                                <input type="text" name="economic_development" placeholder="Enter Economic Development" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> History and Culture </label>
                                <input type="text" name="history_culture" placeholder="Enter History and Culture" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_cultural_heritage" class="btn btn-primary">Save Cultural Heritage</button>
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