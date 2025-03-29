<!DOCTYPE html>
<html>
<head>
    <title>Zippy Used Autos</title>
</head>
<body>
    <h1>Available Vehicles</h1>
    
    <form method="get" action="index.php">
        <label>Sort by:</label>
        <select name="sort" onchange="this.form.submit()">
            <option value="price">Price</option>
            <option value="year">Year</option>
        </select>
    </form>

    <table border="1">
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price ($)</th>
        </tr>
        <?php foreach ($vehicles as $v) : ?>
        <tr>
            <td><?= $v['year'] ?></td>
            <td><?= $v['make_name'] ?></td>
            <td><?= $v['model'] ?></td>
            <td><?= $v['type_name'] ?></td>
            <td><?= $v['class_name'] ?></td>
            <td><?= number_format($v['price'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
