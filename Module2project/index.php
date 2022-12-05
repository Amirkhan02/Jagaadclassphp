<?php
require_once __DIR__ . '/boot.php';

require_once __DIR__ . '/views/header.php';

$students = findStudents();
?>

<h2>Jagaad Module 2 Project</h2>
<body>
<form method="post" action="actions/add-student.php">
      <label>Registration Number:</label><br />
      <input type="intiger" name="registration_num" placeholder="Reg Num" />
      <br/>
      <br>

      <label>Class:</label><br />
      <input type="text" name="class_room" placeholder="Class room" />
      <br/>
      <br>

      <label>Name:</label><br />
      <input type="text" name="full_name" placeholder="Name" />
      <br/>
      <br>

      <label>Grade:</label><br />
      <input type="intiger" name="grade" placeholder="Grade"/>
      <br/>
      <br>

      <label>Email:</label><br />
      <input type="email" name="email" placeholder="email" />
      <br/>
      <br>

      <label>Password:</label><br />
      <input type="password" name="password" placeholder="Password" />
      <br/>
      <br>

      <button type="submit">Add</button>
</form>
<hr/>
<table border="1">
    <thead>
        <tr>
            <th width="50">ID</th>
            <th width="100">Registration Number</th>
            <th width=200>Class room</th>
            <th width=200>Full name</th>
            <th width=200>Grade</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($students as $student): ?>
    <tr>
            <td><?=$student['student_id']?></td>
            <td><?=$student['registration_num']?></td>
            <td><?=$student['class_room']?></td>
            <td><?=$student['fullname']?></td>
            <td><?=$student['grade']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
require_once __DIR__ . '/views/footer.php' 

?>