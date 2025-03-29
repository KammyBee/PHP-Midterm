<?php
require('../model/database.php');
require('../model/types_db.php');

$types = get_types();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['type_name'])) {
        add_type($_POST['type_name']);
    } elseif (isset($_POST['delete_type_id'])) {
        delete_type($_POST['delete_type_id']);
    }
    header("Location: manage_types.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Types</title>
</head>
<body>
    <h1>Manage Types</h1>

    <h2>Existing Types</h2>
    <ul>
        <?php foreach ($types as $type) : ?>
            <li>
                <?= htmlspecialchars($type['type_name']) ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_type_id" value="<?= $type['type_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Add Type</h2>
    <form method="post">
        <label>Type Name:</label>
        <input type="text" name="type_name" required>
        <input type="submit" value="Add">
    </form>
</body>
</html>
