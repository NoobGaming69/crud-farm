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
    <title>Traditional Crop Traits</title>
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
                        <h4>Traditional Crop Traits
                            <a href="traditional_crop_traits-create.php" class="btn btn-primary float-end">Add Traditional Crop Traits</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Traditional Crop Traits ID</th>
                                    <th>Crop Name</th>
                                    <th>Flavor</th>
                                    <th>Scent</th>
                                    <th>Maturation</th>
                                    <th>Drought Tolerance</th>
                                    <th>Environment Adaptability</th>
                                    <th>Culinary Quality</th>
                                    <th>Nutritional value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = pg_query($con, "select traditional_crop_traits.*, crops.crop_name
                                FROM traditional_crop_traits
                                JOIN crops ON traditional_crop_traits.crop_id = crops.crop_id order by traditional_crop_traits_id");

                                if (pg_num_rows($query) > 0) {
                                    while ($traditional_crop_traits = pg_fetch_assoc($query)) {
                                        // Your code inside the loop
                                ?>
                                        <tr>
                                            <td><?= $traditional_crop_traits['traditional_crop_traits_id']; ?></td>
                                            <td><?= $traditional_crop_traits['crop_name']; ?></td>
                                            <td><?= $traditional_crop_traits['flavor']; ?></td>
                                            <td><?= $traditional_crop_traits['scent']; ?></td>
                                            <td><?= $traditional_crop_traits['maturation']; ?></td>
                                            <td><?= $traditional_crop_traits['drought_tolerance']; ?></td>
                                            <td><?= $traditional_crop_traits['environment_adaptability']; ?></td>
                                            <td><?= $traditional_crop_traits['culinary_quality']; ?></td>
                                            <td><?= $traditional_crop_traits['nutritional_value']; ?></td>

                                            <td>
                                                <a href="traditional_crop_traits-view.php?traditional_crop_traits_id=<?= $traditional_crop_traits['traditional_crop_traits_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="traditional_crop_traits-update.php?traditional_crop_traits_id=<?= $traditional_crop_traits['traditional_crop_traits_id']; ?>" class="btn btn-success btn-sm">Update</a>
                                                <form action="code.php" method='POST' class="d-inline">
                                                    <button type="submit" name="delete_traditional_crop_traits" value="<?= $traditional_crop_traits['traditional_crop_traits_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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