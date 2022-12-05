<?php

require_once __DIR__  . '/../boot.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance</title>
</head>
<body>


    <h1>Personal Finance - <?=PAGE_TITLE?></h1>
    <?php if (isAuthenticated()): ?>
    <ul>
    <li><a href="/index.php">Accounts</a></li>
    <li><a href="/transactions.php?type=expenses">Expenses</a></li>
    <li><a href="/transactions.php?type=income">Income</a></li>
    <li><a href="#">Reports</li>
    <li><a href="/actions/handle-logout.php">Logout</li>
</ul>
<br/>
<?php endif ?>
