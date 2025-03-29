<?php
require('../model/vehicles_db.php');
$sort = filter_input(INPUT_GET, 'sort', FILTER_DEFAULT);
$sort = ($sort == 'year') ? 'year' : 'price';
$vehicles = get_vehicles($sort);
include('../view/vehicle_list.php');
