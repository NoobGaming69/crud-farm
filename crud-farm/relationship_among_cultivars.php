<?php
session_start();
require 'connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Traditional Usage</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>DB Admin</h2>
            <li><a href="admin.php">Dashoard</a></li>
            <li><a href="agronomic_information.php">Agronomic Information</a></li>
            <li><a href="arts_and_languages.php">Arts and Languages</a></li>
            <li><a href="common_usage.php">Common Usage</a></li>
            <li><a href="crop_cultural_significance.php">Crop Cultural Significance</a></li>
            <li><a href="crops.php">Crops</a></li>
            <li><a href="cultural_heritage.php">Cultural Heritage</a></li>
            <li><a href="governance.php">Governance</a></li>
            <li><a href="morphological_characteristic.php">Morphological Characteristic</a></li>
            <li><a href="practice.php">Practice</a></li>
            <li><a href="relationship_among_cultivars.php">Relationship Among Cultivars</a></li>
            <li><a href="ritual.php">Rituals</a></li>
            <li><a href="traditional_crop_traits.php">Traditional Crop Traits</a></li>
            <li><a href="traditional_usage.php">Traditional Usage</a></li>
            <li><a href="tribe.php">Tribe</a></li>
            <li><a href="../home.php"> Back to Website</a></li>
        </div>
    </div>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Relationship Among Cultivars
                            <a href="relationship_among_cultivars-create.php" class="btn btn-primary float-end">Add Relationship Among Cultivars</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Relationship Among Cultivars ID</th>
                                    <th>Crop Name</th>
                                    <th>Distinct groups of cultivars based on Morphological and genetic characteristics</th>
                                    <th>Relationships among cultivars based on Cluster analysis and principal component analysis</th>
                                    <th>Potential for hybridization and breeding Among cultivars</th>
                                    <th>Implications for conservation and breeding efforts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = pg_query($con, "select relationship_among_cultivars.*, crops.crop_name
                                FROM relationship_among_cultivars
                                JOIN crops ON relationship_among_cultivars.crop_id = crops.crop_id");

                                if (pg_num_rows($query) > 0) {
                                    while ($relationship_among_cultivars = pg_fetch_assoc($query)) {
                                        // Your code inside the loop
                                ?>
                                        <tr>
                                            <td><?= $relationship_among_cultivars['relationship_among_cultivars_id']; ?></td>
                                            <td><?= $relationship_among_cultivars['crop_name']; ?></td>
                                            <td><?= $relationship_among_cultivars['distinct_cultivar_groups_morph_gen']; ?></td>
                                            <td><?= $relationship_among_cultivars['cultivar_relations_cluster_and_pca']; ?></td>
                                            <td><?= $relationship_among_cultivars['hybridization_potential']; ?></td>
                                            <td><?= $relationship_among_cultivars['conservation_and_breeding_implications']; ?></td>

                                            <td>
                                                <a href="relationship_among_cultivars-view.php?relationship_among_cultivars_id=<?= $relationship_among_cultivars['relationship_among_cultivars_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="relationship_among_cultivars-update.php?relationship_among_cultivars_id=<?= $relationship_among_cultivars['relationship_among_cultivars_id']; ?>" class="btn btn-success btn-sm">Update</a>
                                                <form action="code.php" method='POST' class="d-inline">
                                                    <button type="submit" name="delete_relationship_among_cultivars" value="<?= $relationship_among_cultivars['relationship_among_cultivars_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<h5>No Record Found </h5>';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>