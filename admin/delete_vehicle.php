<?php
require('../model/vehicles_db.php');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

if ($vehicle_id) {
    delete_vehicle($vehicle_id);
}

header("Location: index.php");
