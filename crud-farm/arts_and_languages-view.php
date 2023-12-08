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
                        <h4>Arts and Languages Details
                            <a href="arts_and_languages.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['arts_and_languages_id'])) {
                            $arts_and_languages_id = pg_escape_string($con, $_GET['arts_and_languages_id']);
                            $query = "SELECT arts_and_languages.*, tribe.name
                            FROM arts_and_languages
                            JOIN tribe ON arts_and_languages.tribe_id = tribe.tribe_id WHERE arts_and_languages_id='$arts_and_languages_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $arts_and_languages = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Arts and Languages ID </label>
                                    <p class="form-control"><?= $arts_and_languages['arts_and_languages_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Tribe </label>
                                    <p class="form-control"><?= $arts_and_languages['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Arts and Cultural Expression</label>
                                    <p class="form-control"><?= $arts_and_languages['arts_and_cultural_expression']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Arts and Cultural Expression</label>
                                    <p class="form-control"><?= $arts_and_languages['role_of_indigenous_languages']; ?></p>
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