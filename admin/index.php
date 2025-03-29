<?php
require('../model/vehicles_db.php');

$vehicles = get_vehicles();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Zippy Used Autos</title>
</head>
<body>
    <h1>Admin Vehicle List</h1>
    <table border="1">
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach ($vehicles as $v) : ?>
        <tr>
            <td><?= $v['year'] ?></td>
            <td><?= $v['make_name'] ?></td>
            <td><?= $v['model'] ?></td>
            <td><?= $v['type_name'] ?></td>
            <td><?= $v['class_name'] ?></td>
            <td><?= number_format($v['price'], 2) ?></td>
            <td>
                <form action="delete_vehicle.php" method="post">
                    <input type="hidden" name="vehicle_id" value="<?= $v['vehicle_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
