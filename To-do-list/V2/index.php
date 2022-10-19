<?php
   /*
    echo '<pre>';
    var_dump($_POST);
    echo '<br>--------------------<br>'; */

    define ('STORAGE_TASKS_FILE', 'db.json');
   
    $myTasks = [];

if (file_exists(STORAGE_TASKS_FILE)) {
 $fileContent = file_get_contents(STORAGE_TASKS_FILE);
 $myTasks = json_decode($fileContent, true);
    }

    //add a new task
if (isset($_POST['action']) && $_POST['action'] === 'add-task') {
    $myTasks = addNewTask($myTasks, $_POST['title']);
}

//delete a task
if (isset($_POST['action']) && $_POST['action'] === 'delete-task') {
    $myTasks = deleteTask($myTasks, $_POST['taskIndex']);    
} 

function addNewTask(array $myTasks,  string $title): array {
    $myTasks [] = [
        'title' => $title,
        'done' => 0,
    ];
       //write the $myTasks array to the csv
       $myTasksAsString = json_encode($myTasks);
       file_put_contents(STORAGE_TASKS_FILE, $myTasksAsString);

       return $myTasks;
}

function deleteTask(array $myTasks, string $taskIndex): array{
    $taskIndex = (int)$taskIndex;
    unset($myTasks[$taskIndex]);

      //reset array keys
      $myTasks = array_values($myTasks);

      $myTasksAsString = json_encode($myTasks);
      file_put_contents(STORAGE_TASKS_FILE, $myTasksAsString);

      return $myTasks;
}
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
    <?php 
    /*
        foreach($myTasks as $item) {
        echo "<li>$item <span class='close'>×</span></li>";
    }*/
     ?>

     <?php foreach ($myTasks as $key => $task): ?>
        <?php 
        /*
       if ($task['done'] === 1) {
            $checked = 'class="checked"';
        } else {
            $checked = '';
        } */
        $checked = ($task['done'] === 1) ? 'class="checked"' : '';
        ?> 
        
          
        <li <?=$checked?>>
            <?=$task['title']?>
            <span class='close'>
            × delete
            <input type="hidden"  name="taskClickedKey" value="<?=$key?>" />
            </span>
            </li>
     <?php endforeach ?>
     
        <!----<li class="checked">Workout <span class="close">×</span></li>
        <li>Shopping <span class="close">×</span></li>
        <li>My other task <span class="close">×</span></li>---->
    </ul>
</div>
<script>
    let list = document.querySelector('ul')
    let form = document.querySelector('form[name-task-form]')
    
    //let inputTitle = form.document.querySelector('input[name-title]')
    let inputTaskIndex = form.querySelector('input[name-taskIndex]')
    let inputAction = form.querySelector('input[name=action]')
    list.addEventListener('click', function (event) {
        if (event.target.tagName === 'SPAN'){
            let key = event.target.querySelector('input[name=taskClickedKey]').value
            
            //inputTitle.value = 'trying to delete key: ' + key
            inputTaskIndex.value = key
            inputActiion.value = 'delete-task'
          //alert('you are trying to delete a task: ' + key)
          form.submit()
        }
 })
</script> 