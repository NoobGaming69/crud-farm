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
                        <h4>Tribe Details
                            <a href="tribe.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['tribe_id'])) {
                            $tribe_id = pg_escape_string($con, $_GET['tribe_id']);
                            $query = "SELECT * FROM tribe WHERE tribe_id='$tribe_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $tribe = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Tribe ID </label>
                                    <p class="form-control"><?= $tribe['tribe_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Tribe Name </label>
                                    <p class="form-control"><?= $tribe['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Description </label>
                                    <p class="form-control"><?= $tribe['description']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Traditional Way of Life</label>
                                    <p class="form-control"><?= $tribe['traditional_way_of_life']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Religous Belief</label>
                                    <p class="form-control"><?= $tribe['religous_belief']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Languages</label>
                                    <p class="form-control"><?= $tribe['languages']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <p class="form-control"><?= $tribe['image']; ?></p>
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