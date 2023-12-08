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
                        <h4>Add Arts and Languages
                            <a href="arts_and_languages.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["tribe_id"].value;
                                var b = document.forms["Form"]["arts_and_cultural_expression"].value;
                                var c = document.forms["Form"]["role_of_indigenous_languages"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "") {
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
                                <label> Arts and Cultural Expression </label>
                                <input type="text" name="arts_and_cultural_expression" placeholder="Enter Arts and Cultural Expression" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Role of Indegenous Languages </label>
                                <input type="text" name="role_of_indigenous_languages" placeholder="Enter Role of Indegenous Languages" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_arts_and_languages" class="btn btn-primary">Save Arts and Languages</button>
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