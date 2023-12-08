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
                        <h4>Relationship Among Cultivars Details
                            <a href="relationship_among_cultivars.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['relationship_among_cultivars_id'])) {
                            $relationship_among_cultivars_id = pg_escape_string($con, $_GET['relationship_among_cultivars_id']);
                            $query = "SELECT relationship_among_cultivars.*, crops.crop_name
                            FROM relationship_among_cultivars
                            JOIN crops ON relationship_among_cultivars.crop_id = crops.crop_id where relationship_among_cultivars_id='$relationship_among_cultivars_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $relationship_among_cultivars = pg_fetch_assoc($query_run);
                        ?>
                                <div class="mb-3">
                                    <label> Relationship Among Cultivars ID </label>
                                    <p class="form-control"><?= $relationship_among_cultivars['relationship_among_cultivars_id']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Crop Name </label>
                                    <p class="form-control"><?= $relationship_among_cultivars['crop_name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label> Distinct groups of cultivars based on Morphological and genetic characteristics </label>
                                    <p class="form-control"><?= $relationship_among_cultivars['distinct_cultivar_groups_morph_gen']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Relationships among cultivars based on Cluster analysis and principal component analysis</label>
                                    <p class="form-control"><?= $relationship_among_cultivars['cultivar_relations_cluster_and_pca']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Potential for hybridization and breeding Among cultivars</label>
                                    <p class="form-control"><?= $relationship_among_cultivars['hybridization_potential']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Implications for conservation and breeding efforts</label>
                                    <p class="form-control"><?= $relationship_among_cultivars['conservation_and_breeding_implications']; ?></p>
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