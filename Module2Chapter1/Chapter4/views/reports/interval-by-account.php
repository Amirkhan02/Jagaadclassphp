<?php
$begin = filter_input(INPUT_GET, 'begin'); 
$ends = filter_input(INPUT_GET, 'ends');
$accountId = filter_input(INPUT_GET, 'account_id', FILTER_SANITIZE_NUMBER_INT);

$rows = transactionsByIntervalAndAccount($begin, $ends, $accountId);

$accounts = findAccounts();
?>

<h3>Interval By Account</h3>

<form method="post" action="actions/create-transaction.php">
<input type="hidden" name="type" value="<?=$type?>"/>

      <label>Interval:</label> <br/>
      <input type="date" name="begin" placeholder="Start at" value="<?=$begin?>" required/>
      <input type="date" name="ends" placeholder="Ends at" value="<?=$ends?>" required />
      <select name="account_id" required> 
        <option value="">Select the account</option>
       
        <?php foreach ($accounts as $account): ?>
          <option value="<?=$account ['account_id']?>" <?=($accountId = $account
          ['account_id']) ? 'selected' : ''?>>
          <?=$account['name']?>
          </option>
          <?php endforeach ?>
      </select>
      <button type="submit">Apply</button>

      <br/>
      <br/>

<table border='1'>
<thead>
    <tr>
       <th>Name</th>
       <th>Amount</th>
       <th>Category</th>
       <th>Date</th>
       <th>Account</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($row as $row): ?>
    <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['amount']?></td>
        <td><?=$row['category']?></td>
        <td><?=$row('M/d/y', strtotime($transaction['transaction_date']))?></td>
        <td><?=$row['account_name']?></td>
    </tr>
    <?php endforeach ?>

</tbody>
</table>