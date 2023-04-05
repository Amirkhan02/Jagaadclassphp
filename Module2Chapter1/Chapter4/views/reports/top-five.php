<?php
$rows = top5BiiggestTransaction();
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