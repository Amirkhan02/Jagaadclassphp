<?php 
define('PAGE_TITLE', 'Income');
require_once __DIR__ . '/views/header.php' 
?>
      <form method="post" action="create_account.php"></form>
      <label>Name</label>
      <input type="text" name="account_name" placeholder="Name" />
      <br/>

      <label>Description</label><br />
      <textarea name="account_description"></textarea>
      <br/>

      <button type="submit">Create</button>
</form>
<hr/>
<table border="1">
    <thead>
        <tr>
            <th width="50">ID</th>
            <th width="100">Name</th>
            <th width=200>Description</th>
        </tr>
    </thead>

    <tbody>
    <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
        </tr>
    </tbody>
</table>
    
<?php require_once __DIR__ . '/views/footer.php' ?>