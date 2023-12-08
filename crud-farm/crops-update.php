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
                        <h4>Update Crop
                            <a href="crops.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php

                        if (isset($_GET['crop_id'])) {
                            $crop_id = pg_escape_string($con, $_GET['crop_id']);
                            $query = "SELECT * FROM crops WHERE crop_id='$crop_id'";
                            $query_run = pg_query($con, $query);

                            if (pg_num_rows($query_run) > 0) {
                                $crops = pg_fetch_assoc($query_run);
                        ?>
                                <form action="code.php" autocomplete="off" method="POST">
                                    <input type="hidden" name="crop_id" value="<?= $crop_id; ?>">

                                    <div class="mb-3">
                                        <label> Crop Name </label>
                                        <input type="text" name="crop_name" value="<?= $crops['crop_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Scientific Names </label>
                                        <input type="text" name="scientific_name" value="<?= $crops['scientific_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Variety Name </label>
                                        <input type="text" name="variety_name" value="<?= $crops['variety_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Meaning of Name </label>
                                        <input type="text" name="meaning_of_name" value="<?= $crops['meaning_of_name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Description </label>
                                        <input type="text" name="description" value="<?= $crops['description']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> When or How Used </label>
                                        <input type="text" name="when_how_used" value="<?= $crops['when_how_used']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Upland or Lowland </label>
                                        <input type="text" name="upland_or_lowland" value="<?= $crops['upland_or_lowland']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Season </label>
                                        <input type="text" name="season" value="<?= $crops['season']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Conservation Status </label>
                                        <input type="text" name="conservation_status" value="<?= $crops['conservation_status']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Economic Importance </label>
                                        <input type="text" name="economic_importance" value="<?= $crops['economic_importance']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Category </label>
                                        <input type="text" name="category" value="<?= $crops['category']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Image </label>
                                        <input type="text" name="image" value="<?= $crops['image']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Links </label>
                                        <input type="text" name="links" value="<?= $crops['links']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Preservation Status </label>
                                        <input type="text" name="preservation_status" value="<?= $crops['preservation_status']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_crops" class="btn btn-primary">Update Crop</button>
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