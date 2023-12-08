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
                        <h4>Add Tribe
                            <a href="tribe.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <script type="text/javascript">
                            function validateForm() {
                                var a = document.forms["Form"]["name"].value;
                                var b = document.forms["Form"]["description"].value;
                                var c = document.forms["Form"]["traditional_way_of_life"].value;
                                var d = document.forms["Form"]["religous_belief"].value;
                                var e = document.forms["Form"]["languages"].value;
                                var f = document.forms["Form"]["image"].value;

                                if (a == null || a == "", b == null || b == "", c == null || c == "",
                                    d == null || d == "", e == null || e == "", f == null || f == "") {
                                    alert("Please Fill In All Required Details");
                                    return false;
                                }
                            }
                        </script>

                        <form name="Form" action="code.php" autocomplete="off" onsubmit="return validateForm()" method="POST">

                            <div class="mb-3">
                                <label> Tribe Name </label>
                                <input type="text" name="name" placeholder="Enter Tribe Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Description </label>
                                <input type="text" name="description" placeholder="Enter Description" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Traditional Way of Life </label>
                                <input type="text" name="traditional_way_of_life" placeholder="Enter Traditional Way of Life" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Religous Belief </label>
                                <input type="text" name="religous_belief" placeholder="Enter Religous Belief " class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Languages </label>
                                <input type="text" name="languages" placeholder="Enter Languages" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Image </label>
                                <input type="text" name="image" placeholder="Enter image" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_tribe" class="btn btn-primary">Save Tribe</button>
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