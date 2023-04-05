<?php 

require_once __DIR__ . '/boot.php';
protectPage();

$type = $_GET['type'] ?? 'expenses';

$validTypes = ['income', 'expenses'];
if (! in_array($type, $validTypes)) {
    die("I don't understand you :/");
}

if ($type === 'expenses') {
    define('PAGE_TITLE', 'Expenses');
} else {
    define('PAGE_TITLE', 'Income');
}

$transactions = findTransactions($type);
$accounts = findAccounts();

require_once __DIR__ . '/views/header.php';

//var_dump($transactions);
?>
<?php if (hasAlertStatus(ALERT_MSG_SUCCESS)): ?>
<i><?=extractAlertMessage()?></i><br />
<?php endif ?>

 
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
        <?php endif ?>
        </select>
        <br />

        <label>Account:</label><br />
      <select name="account_id" required> 
        <option value=""></option>
        <?php foreach ($accounts as $account): ?>
     
          <option value="<?=$account['account_id']?>"><?=$account['name']?></option>
          <?php endforeach ?>
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
            <td align="right"><?=$transaction['transaction_id']?></td>
            <td><?=$transaction['name']?></td>
            <td align="right">$ <?=$transaction['amount']?></td>
            <td><?=$transaction['category']?></td>
            <td><?=date('M/d/y', strtotime($transaction['transaction_date']))?></td>
            <td><?=$transaction['occurrence'] ? 'Monthly' : 'No'?></td>
            <td><?=$transaction['status']?></td>
            <td><?=$transaction['account_name']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
        </table>

<?php 
require_once __DIR__ . '/views/footer.php' 
?>

    
      
      
