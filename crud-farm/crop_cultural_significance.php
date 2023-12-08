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
    <title>Crop Cultural Significance</title>
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
                        <h4>Crop Cultural Significance
                            <a href="crop_cultural_significance-create.php" class="btn btn-primary float-end">Add Crop Cultural Significance</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cultural Significance ID</th>
                                    <th>Crop Name</th>
                                    <th>Historical Context and Traditional Knowledge</th>
                                    <th>Role in Local Cuisine and Customs</th>
                                    <th>Cultural Values and Beliefs Associated with Traditional Crop</th>
                                    <th>Cultural and Spiritual Significance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = pg_query($con, "select crop_cultural_significance.*, crops.crop_name
                                FROM crop_cultural_significance
                                JOIN crops ON crop_cultural_significance.crop_id = crops.crop_id order by crop_cultural_significance.cultural_significance_id");

                                if (pg_num_rows($query) > 0) {
                                    while ($crop_cultural_significance = pg_fetch_assoc($query)) {
                                        // Your code inside the loop
                                ?>
                                        <tr>
                                            <td><?= $crop_cultural_significance['cultural_significance_id']; ?></td>
                                            <td><?= $crop_cultural_significance['crop_name']; ?></td>
                                            <td><?= $crop_cultural_significance['historical_context_and_traditional_knowledge']; ?></td>
                                            <td><?= $crop_cultural_significance['role_in_local_cuisine_and_customs']; ?></td>
                                            <td><?= $crop_cultural_significance['cultural_values_and_beliefs_associated_with_traditional_crop']; ?></td>
                                            <td><?= $crop_cultural_significance['cultural_and_spiritual_significance']; ?></td>
                                            <td>
                                                <a href="crop_cultural_significance-view.php?cultural_significance_id=<?= $crop_cultural_significance['cultural_significance_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="crop_cultural_significance-update.php?cultural_significance_id=<?= $crop_cultural_significance['cultural_significance_id']; ?>" class="btn btn-success btn-sm">Update</a>
                                                <form action="code.php" method='POST' class="d-inline">
                                                    <button type="submit" name="delete_crop_cultural_significance" value="<?= $crop_cultural_significance['cultural_significance_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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