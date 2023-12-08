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

    <title>Update</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Relationship Among Cultivars
                            <a href="relationship_among_cultivars.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['relationship_among_cultivars_id'])) {
                            $relationship_among_cultivars_id = pg_escape_string($con, $_GET['relationship_among_cultivars_id']);
                            $query = "SELECT * FROM relationship_among_cultivars WHERE relationship_among_cultivars_id='$relationship_among_cultivars_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $relationship_among_cultivars = pg_fetch_assoc($query_run);
                                $current_crop_id = $relationship_among_cultivars['crop_id'];

                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="relationship_among_cultivars_id" value="<?= $relationship_among_cultivars_id; ?>">

                                    <div class="mb-3">
                                        <select name="crop_id">
                                            <?php
                                            // PHP code to display available crop from the database
                                            // Query to select all available crop in the database
                                            $query2 = "SELECT * FROM crops";

                                            // Executing query
                                            $query_run2 = pg_query($con, $query2);

                                            // Count rows to check whether we have a crop or not
                                            $count2 = pg_num_rows($query_run2);

                                            // If count is greater than 0, we have a crop; else, we do not have a crop
                                            if ($count2 > 0) {
                                                // We have a schedule
                                                while ($row2 = pg_fetch_assoc($query_run2)) {
                                                    // Get the details of the crop
                                                    $crop_id = $row2['crop_id'];
                                                    $crop_name = $row2['crop_name'];

                                            ?>
                                                    <option <?php if ($current_crop_id == $crop_id) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $crop_id; ?>"><?php echo $crop_name; ?></option>
                                                <?php
                                                }
                                            } else {
                                                // We do not have a crop
                                                ?>
                                                <option value="0">No crop name Found</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label> Distinct groups of cultivars based on Morphological and genetic characteristic </label>
                                        <input type="text" name="distinct_cultivar_groups_morph_gen" value="<?= $relationship_among_cultivars['distinct_cultivar_groups_morph_gen']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Relationships among cultivars based on Cluster analysis and principal component analysis </label>
                                        <input type="text" name="cultivar_relations_cluster_and_pca" value="<?= $relationship_among_cultivars['cultivar_relations_cluster_and_pca']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Potential for hybridization and breeding Among cultivars </label>
                                        <input type="text" name="hybridization_potential" value="<?= $relationship_among_cultivars['hybridization_potential']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Implications for conservation and breeding efforts </label>
                                        <input type="text" name="conservation_and_breeding_implications" value="<?= $relationship_among_cultivars['conservation_and_breeding_implications']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_relationship_among_cultivars" class="btn btn-primary">Update Relationship Among Cultivars</button>
                                    </div>
                                </form>
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