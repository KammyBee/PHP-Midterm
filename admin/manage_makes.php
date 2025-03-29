<?php
require('../model/database.php');
require('../model/makes_db.php');

$makes = get_makes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['make_name'])) {
        add_make($_POST['make_name']);
    } elseif (isset($_POST['delete_make_id'])) {
        delete_make($_POST['delete_make_id']);
    }
    header("Location: manage_makes.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Makes</title>
</head>
<body>
    <h1>Manage Makes</h1>

    <h2>Existing Makes</h2>
    <ul>
        <?php foreach ($makes as $make) : ?>
            <li>
                <?= htmlspecialchars($make['make_name']) ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_make_id" value="<?= $make['make_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Add Make</h2>
    <form method="post">
        <label>Make Name:</label>
        <input type="text" name="make_name" required>
        <input type="submit" value="Add">
    </form>
</body>
</html>
