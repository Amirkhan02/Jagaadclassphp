<?php
$numberOfStudent = (int)readline('How many students does the class have?:');
$studens = [];
$studentsName = [];

 $a = 1;
 while ($a <= $numberOfStudent){
        $name = readline("Name $a:");
        

        if (in_array($name, $studentsName)) {
                echo "Name already exist, try again. \n";
                continue;
}
                
        $grade = readline("Grade $a:");

                $students[] = [
                        'name' => $name,
                        'grade' => (float)$grade,
                ];

                $studentName[] = $name;
                $a++;
        }

        $bestStudent = [
                'name' => null,
                'grade' => 0,
        ];

        foreach($students as $student) {
                if ($student['grade'] > $bestStudent['grade']) {
                        $bestStudent = $student;
                }
        }
        echo <<<OUTPUT
        The best student is $bestStudent[name], grade: $bestStudent[grade]
        OUTPUT;
        

?>