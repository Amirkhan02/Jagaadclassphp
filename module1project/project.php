

<?php
$filename = 'db.csv';

$myStudent = [];


if (file_exists($filename)) {

    //open the file and read row by row
       $fo = fopen($filename, 'r');
       while ($row = fgets($fo)) {
           $rowList = explode(',', trim($row));
           
           $myStudent[] = [
            'reg' => $rowList[0],
            'fname' => $rowList[1],
            'lname' => $rowList[2],
            'grade' => $rowList[3],
            'classroom' => $rowList[4],
           ];
        }
       fclose($fo);
        }

       if (isset($_POST['action']) && $_POST['action'] === 'add-student') {
        $myStudent[] = [
            'reg' => $_POST['reg'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'grade' => $_POST['grade'],
            'class' => $_POST['class'], 
        ];
    }

    $fo = fopen($filename, 'w+');
    foreach ($myStudent as $student) {
        $newStudent = implode(',', $student);
        fputs($fo, $newStudent . PHP_EOL);
    }
    fclose($fo);

    
?>

<link rel="stylesheet" href="style.css">
<div class="container">
    <div id="student-form" class="header">
        <form name="student-form" method="post" action="project.php">
            <h2>Jagaad Module 1 Project</h2>

            <div>
            <p><label>Registration Number:
            <input type="text" name="reg:" placeholder="Registration number"> <br>
</p>
           <p> <label>First Name:
            <input type="text" name="fname:" placeholder="First Name"> <br>

            <p> <label>Last Name:
            <input type="text" name="lname:" placeholder="Last Name"> <br>
</p> 
           <p> <label>Student Grade:
            <input type="text" name="grade:" placeholder="Grade"> <br>
</p>
           <p> <label>Class:
            <input type="text" name="class:" placeholder="Classroom"><br>
</p>
            <button type="submit" class="addBtn">Add Student</button>
            <input type="hidden" name="taskIndex" value="#" />
            <input type="hidden" name="action" value="add-student" />
        </form>
    </div>
    
    </div>


    
    <ul id="student-list">
   

     <?php foreach ($myStudent as $key => $student): ?>
        <?php 
        
        ?> 
        
          
        <li>
            <?=$student['reg']?>
            <span class='close'>
            × delete
            <input type="hidden"  name="studentClickedKey" value="<?=$key?>" />
            </span>
            </li>

            <?=$student['fname']?>
            <span class='close'>
            × delete
            <input type="hidden"  name="studentClickedKey" value="<?=$key?>" />
            </span>
            </li>

            <?=$student['lname']?>
            <span class='close'>
            × delete
            <input type="hidden"  name="studentClickedKey" value="<?=$key?>" />
            </span>
            </li>

            <?=$student['grade']?>
            <span class='close'>
            × delete
            <input type="hidden"  name="studentClickedKey" value="<?=$key?>" />
            </span>
            </li>

            <?=$student['classroom']?>
            <span class='close'>
            × delete
            <input type="hidden"  name="studentClickedKey" value="<?=$key?>" />
            </span>
            </li>
     <?php endforeach ?>
     
    </ul>
</div>

   

    