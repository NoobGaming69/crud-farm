<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Create</title>

</head>

<body>


    <div class="container mt-5">

        <?php include('message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Crop Info
                            <a href="crops.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["crop_name"].value;
                                var b = document.forms["Form"]["variety_name"].value;
                                var c = document.forms["Form"]["meaning_of_name"].value;
                                var d = document.forms["Form"]["description"].value;
                                var e = document.forms["Form"]["when_how_used"].value;
                                var f = document.forms["Form"]["upland_or_lowland"].value;
                                var g = document.forms["Form"]["season"].value;
                                var h = document.forms["Form"]["conservation_status"].value;
                                var i = document.forms["Form"]["economic_importance"].value;
                                var j = document.forms["Form"]["category"].value;
                                var k = document.forms["Form"]["image"].value;
                                var l = document.forms["Form"]["links"].value;
                                var m = document.forms["Form"]["scientific_name"].value;
                                var n = document.forms["Form"]["preservation_status"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "",
                                    d == null || d == "", e == null || e == "", f == null || f == "",
                                    g == null || g == "", h == null || h == "", i == null || i == "",
                                    j == null || j == "", k == null || k == "", l == null || l == "",
                                    m == null || m == "", n == null || n == "") {
                                    alert("Please Fill In All Required Details");
                                    return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Image Link </label>
                                <input type="text" name="image" placeholder="Enter Image Link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Crop Name </label>
                                <input type="text" name="crop_name" placeholder="Enter Crop Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Scientific Name </label>
                                <input type="text" name="scientific_name" placeholder="Enter Scientific Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Variety Names </label>
                                <input type="text" name="variety_name" placeholder="Enter Variety Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Meaniong o Names </label>
                                <input type="text" name="meaning_of_name" placeholder="Enter Meaning of Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Description </label>
                                <input type="text" name="description" placeholder="Enter Description" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> When or How Used </label>
                                <input type="text" name="when_how_used" placeholder="When or How Used" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Upland or Lowland </label>
                                <input type="text" name="upland_or_lowland" placeholder="Upland or Lowland" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Season </label>
                                <input type="text" name="season" placeholder="Enter Season" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Conservation Status </label>
                                <input type="text" name="conservation_status" placeholder="Enter Conservation Status" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Economic Importance </label>
                                <input type="text" name="economic_importance" placeholder="Enter Economic Importance" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Category </label>
                                <input type="text" name="category" placeholder="Enter Category (rice, corn, potato, etc.)" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Image Link </label>
                                <input type="text" name="image" placeholder="Enter Image link" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Links </label>
                                <input type="text" name="links" placeholder="Enter Links if available" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Preservation Status </label>
                                <input type="text" name="preservation_status" placeholder="Enter Preservation Status" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_crops" class="btn btn-primary">Save Crop</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>