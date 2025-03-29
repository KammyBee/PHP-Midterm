<?php
require('../model/database.php');
require('../model/classes_db.php');

$classes = get_classes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['class_name'])) {
        add_class($_POST['class_name']);
    } elseif (isset($_POST['delete_class_id'])) {
        delete_class($_POST['delete_class_id']);
    }
    header("Location: manage_classes.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Classes</title>
</head>
<body>
    <h1>Manage Classes</h1>

    <h2>Existing Classes</h2>
    <ul>
        <?php foreach ($classes as $class) : ?>
            <li>
                <?= htmlspecialchars($class['class_name']) ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete_class_id" value="<?= $class['class_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Add Class</h2>
    <form method="post">
        <label>Class Name:</label>
        <input type="text" name="class_name" required>
        <input type="submit" value="Add">
    </form>
</body>
</html>
