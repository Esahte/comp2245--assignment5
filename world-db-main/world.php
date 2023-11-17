<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$country = filter_input(INPUT_GET, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lookup = filter_input(INPUT_GET, 'lookup', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'countries';

if ($lookup === 'cities') {
    $stmt = $conn->prepare("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE :country");
} else {
    $stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
}

$stmt->execute(['country' => "%$country%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <tr>
            <?php if ($lookup === 'cities'): ?>
                <th>Name</th>
                <th>District</th>
                <th>Population</th>
            <?php else: ?>
                <th>Country Name</th>
                <th>Continent</th>
                <th>Independence Year</th>
                <th>Head of State</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <?php if ($lookup === 'cities'): ?>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['district'] ?></td>
                    <td><?= $row['population'] ?></td>
                <?php else: ?>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['continent'] ?></td>
                    <td><?= $row['independence_year'] ?></td>
                    <td><?= $row['head_of_state'] ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



