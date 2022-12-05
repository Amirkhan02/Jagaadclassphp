
<?php 
//assign $_GET['type'] to $type if it exist
//the default is 'expenses'
$type = $_GET['type'] ?? 'expenses';

$validTypes = ['income', 'expenses'];
if (! in_array($type, $validTypes)) {
    die("I don't understand you:/");
}

if ($type === 'expenses') {
    define('PAGE_TITLE', 'Expenses');
} else {
    define('PAGE_TITLE', 'Income');
}

require_once __DIR__ . '/views/header.php';
require_once __DIR__ . '/functions/db-transactions.php';

$transactions = findTransactions();
?>
      <form method="post" action="actions/create-transaction.php">
      <label>Name:</label> <br/>
      <input type="text" name="name" placeholder="Name" />
      <br/>

      <label>Amount:</label> <br/>
      <input type="number" name="amount" placeholder="Amount" />
      <br/>

      <label>Category:</label><br/>
      <select name="Category"> 
      <?php if ($type === 'expenses'): ?>
        <option value="travel">Travel</option>
        <option value="food">Food</option>
        <option value="shopping">Shopping</option>
        <option value="work">Work</option>
        <option value="electronics">Electronics</option>
        <option value="gpus">Gpus</option>
      <?php else: ?>
        <option value="salary">Salary</option>
        <option value="freelancing">Freelancing</option>
        <option value="investivement">Investivement</option>
      <?php endif ?>
      
      <option value="others">Others</option>
      </select>
      <br/>

      <label>Date:</label><br/>
      <input type="date" name="transaction_date" />
      <br/>

      <label>Occurrence:</label><br />
      <select name="Occurrence"> 
        <option value="">No occurrence</option>
        <option value="fixed">fixed (monthly)</option>
      </select>
      <br/>

      <label>Status:</label><br />
      <select name="Status"> 
        <?php if ($type === 'expenses'): ?>
        <option value="unpaid">Unpaid</option>
        <option value="Paid">Paid</option>
        <?php else: ?>
            <option value="unreceived">Unreceived</option>
        <option value="received">Received</option>
        <r?php endif ?>
      </select>
      <br/>
      <input type="hidden" name="type" value="<?=$type?>" />
      <button type="submit">Create</button>
</form>
<br />
<br />

<table border="1">
    <thead>
        <tr>
            <th width="50">ID</th>
            <th width="200">Name</th>
            <th width=100>Amount</th>
            <th width=100>Category</th>
            <th width=100>Date</th>
            <th width=100>Occurrence</th>
            <th width=100>Status</th>
            <th width=100>Account</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction): ?>
    <tr>
            <td><?=$transaction['transaction_id']?></td>
            <td><?=$transaction['name']?></td>
            <td><?=$transaction['amount']?></td>
            <td><?=$transaction['category']?></td>
            <td><?=$transaction['transaction_date']?></td>
            <td><?=$transaction['occurrence']?></td>
            <td><?=$transaction['status']?></td>
            <td><?=$transaction['account_id']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
 
    <?php require_once __DIR__ . '/views/footer.php' ?>