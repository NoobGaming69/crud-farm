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
                        <h4>Traditional Usage
                            <a href="traditional_usage-create.php" class="btn btn-primary float-end">Add Traditional Usage</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Traditional Usage ID</th>
                                    <th>Crop Name</th>
                                    <th>Culinary Application</th>
                                    <th>Medicinal Usage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = pg_query($con, "select traditional_usage.*, crops.crop_name
                                FROM traditional_usage
                                JOIN crops ON traditional_usage.crop_id = crops.crop_id");

                                if (pg_num_rows($query) > 0) {
                                    while ($traditional_usage = pg_fetch_assoc($query)) {
                                        // Your code inside the loop
                                ?>
                                        <tr>
                                            <td><?= $traditional_usage['traditional_usage_id']; ?></td>
                                            <td><?= $traditional_usage['crop_name']; ?></td>
                                            <td><?= $traditional_usage['culinary_application']; ?></td>
                                            <td><?= $traditional_usage['medicinal_usage']; ?></td>
                                            <td>
                                                <a href="traditional_usage-view.php?traditional_usage_id=<?= $traditional_usage['traditional_usage_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="traditional_usage-update.php?traditional_usage_id=<?= $traditional_usage['traditional_usage_id']; ?>" class="btn btn-success btn-sm">Update</a>
                                                <form action="code.php" method='POST' class="d-inline">
                                                    <button type="submit" name="delete_traditional_usage" value="<?= $traditional_usage['traditional_usage_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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