<?php
require_once __DIR__ . '/boot.php';

?>
<form action="actions/handle-login.php" method="post">
<?php if (hasAlertStatus(ALERT_MSG_ERROR)): ?>
 <i><?= extractAlertMessage()?></i><br /><br />
 <?php endif ?>
 

Email: <br />
<input type="email" name="email" /><br />
password: <br />
<input type="password" name="password" /><br />

<button type="submit">Login</button>
</form>
<?php
require_once __DIR__ . '/views/footer.php'; 
?>