<?php
$con = pg_connect("host=localhost dbname=farm_crops user=postgres password=123");
if (!$con) {
    echo "An error occured";
    exit;
}
?>