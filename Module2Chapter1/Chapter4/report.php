<?php
require_once __DIR__ . '/boot.php';
protectPage();

$sql = <<<SQL
SELECT SUM(amount) AS total, category, typw
FROM transactions
GROUP BY category, type 
ORDER BY total Description
LIMIT 5;
SQL;

$mysqli = connect();

$result = $mysqli->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

define('PAGE_TITLE', 'Reports');
require_once __DIR__ . '/views/header.php'
?>

<h3>Top 5 Biggest Transactios</h3>
<table border='1'>
<thead>
    <tr>
       <th>Type</th>
       <th>Category</th>
       <th>Amount</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($row as $row): ?>
    <tr>
        <td><?=$row['type']?></td>
        <td><?=$row['category']?></td>
        <td><?=$row['total']?></td>
    </tr>
    <?php endforeach ?>

</tbody>
</table>

<?php
require_once __DIR__ . '/views/footer.php'; 
?>