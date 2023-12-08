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
                        <h4>Add Practice
                            <a href="practice.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["practice_id"].value;
                                var b = document.forms["Form"]["tribe_id"].value;
                                var c = document.forms["Form"]["practice_name"].value;
                                var c = document.forms["Form"]["description"].value;
                                var c = document.forms["Form"]["image"].value;
                                var c = document.forms["Form"]["planting_practice"].value;
                                var c = document.forms["Form"]["post_harvest_practice"].value;
                                var c = document.forms["Form"]["pest_control"].value;
                                var c = document.forms["Form"]["tools_or_equipment"].value;
                                var c = document.forms["Form"]["cultural_significance"].value;
                                var c = document.forms["Form"]["definition_and_characteristics"].value;
                                var c = document.forms["Form"]["length_of_practice_period"].value;
                                var c = document.forms["Form"]["intervention_and_alternatives"].value;
                                var c = document.forms["Form"]["challenges_and_sustainability_of_this_practice"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "",
                                    d == null || d == "", e == null || e == "", f == null || f == "",
                                    g == null || g == "", h == null || h == "", i == null || i == "", j == null || j == "",
                                    k == null || k == "", l == null || l == "", m == null || m == "", n == null || n == "") {
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
                                <label> Practice Name </label>
                                <input type="text" name="practice_name" placeholder="Enter Practice Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Description </label>
                                <input type="text" name="description" placeholder="Enter Description" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Image </label>
                                <input type="text" name="image" placeholder="Enter Image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Planting Practices </label>
                                <input type="text" name="planting_practice" placeholder="Enter Planting Practices" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Post Harvest Practice </label>
                                <input type="text" name="post_harvest_practice" placeholder="Enter Post Harvest Practice" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Pest Control </label>
                                <input type="text" name="pest_control" placeholder="Enter Pest Control" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Tools or Equipment </label>
                                <input type="text" name="tools_or_equipment" placeholder="Enter Tools or Equipment" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Cultural Significance </label>
                                <input type="text" name="cultural_significance" placeholder="Enter Cultural Significance" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Definition and Characteristics </label>
                                <input type="text" name="definition_and_characteristics" placeholder="Enter Definition and Characteristics" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Length of Practice Method </label>
                                <input type="text" name="length_of_practice_period" placeholder="Enter Length of Practice Method" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Intervention and Alternatives </label>
                                <input type="text" name="intervention_and_alternatives" placeholder="Enter Intervention and Alternatives" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Challenges and Sustainability of this Practice </label>
                                <input type="text" name="challenges_and_sustainability_of_this_practice" placeholder="Enter Challenges and Sustainability of this Practice" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_practice" class="btn btn-primary">Save Practice</button>
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