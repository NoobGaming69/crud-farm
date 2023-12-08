<?php
require 'connection/connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>View</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Practice Details
                            <a href="practice.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php

                        if (isset($_GET['practice_id'])) {
                            $practice_id = pg_escape_string($con, $_GET['practice_id']);
                            $query = "SELECT practice.*, tribe.name
                            FROM practice
                            JOIN tribe ON practice.tribe_id = tribe.tribe_id where practice_id=$practice_id";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $practice = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Practice ID </label>
                                    <p class="form-control"><?= $practice['practice_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Tribe Name </label>
                                    <p class="form-control"><?= $practice['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Practice Name </label>
                                    <p class="form-control"><?= $practice['practice_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Description </label>
                                    <p class="form-control"><?= $practice['description']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <p class="form-control"><?= $practice['image']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Planting Practice</label>
                                    <p class="form-control"><?= $practice['planting_practice']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Post Harvest Practice</label>
                                    <p class="form-control"><?= $practice['post_harvest_practice']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Pest Control</label>
                                    <p class="form-control"><?= $practice['pest_control']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Tools or Equipment</label>
                                    <p class="form-control"><?= $practice['tools_or_equipment']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Cultural Significance</label>
                                    <p class="form-control"><?= $practice['cultural_significance']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Definition and Characteristics</label>
                                    <p class="form-control"><?= $practice['definition_and_characteristics']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Length of Practice Period</label>
                                    <p class="form-control"><?= $practice['length_of_practice_period']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Intervention and Alternative</label>
                                    <p class="form-control"><?= $practice['intervention_and_alternatives']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Challenges and Sustainability of this Practice</label>
                                    <p class="form-control"><?= $practice['challenges_and_sustainability_of_this_practice']; ?></p>
                                </div>
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