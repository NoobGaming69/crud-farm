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
                        <h4>Governance Details
                            <a href="governance.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['governance_id'])) {
                            $governance_id = pg_escape_string($con, $_GET['governance_id']);
                            $query = "SELECT governance.*, tribe.name
                            FROM governance
                            JOIN tribe ON governance.tribe_id = tribe.tribe_id where governance_id=$governance_id";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $governance = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Governance ID </label>
                                    <p class="form-control"><?= $governance['governance_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Tribe Name </label>
                                    <p class="form-control"><?= $governance['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Preservation of Cultural Heritage </label>
                                    <p class="form-control"><?= $governance['tribal_governance']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Economic Development</label>
                                    <p class="form-control"><?= $governance['intertribal_relations']; ?></p>
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