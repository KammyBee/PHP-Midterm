<?php
require_once('database.php');

function get_vehicles($sort_by = 'price') {
    global $db;
    $query = "SELECT * FROM vehicles 
              INNER JOIN makes ON vehicles.make_id = makes.make_id
              INNER JOIN classes ON vehicles.class_id = classes.class_id
              INNER JOIN types ON vehicles.type_id = types.type_id
              ORDER BY $sort_by DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}
