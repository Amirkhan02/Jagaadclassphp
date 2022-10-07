<?php
   echo $_POST['title'];
   echo '<br>------------<br>';
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <div id="task-form" class="header">
        <form name="task-form" method="post" action="index.php">
            <h2>My To Do List</h2>
            <input type="text" name="title" placeholder="Title...">
            <button type="submit" class="addBtn">Add</button>
            <input type="hidden" name="taskIndex" value="#" />
            <input type="hidden" name="action" value="add-task" />
        </form>
    </div>

    <ul id="task-list">
        <li class="checked">Workout <span class="close">×</span></li>
        <li>Shopping <span class="close">×</span></li>
        <li>My other task <span class="close">×</span></li>
    </ul>
</div>
<div class="container">
    <div id="task-form" class="header">
        <form name="task-form" method="post" action="index.php">
            <h2>My To Do List</h2>
            <input type="text" name="title" placeholder="Title...">
            <button type="submit" class="addBtn">Add</button>
            <input type="hidden" name="taskIndex" value="#" />
            <input type="hidden" name="action" value="add-task" />
        </form>
    </div>

    <ul id="task-list">
        <li class="checked">Workout <span class="close">×</span></li>
        <li>Shopping <span class="close">×</span></li>
        <li>My other task <span class="close">×</span></li>
    </ul>
</div>
