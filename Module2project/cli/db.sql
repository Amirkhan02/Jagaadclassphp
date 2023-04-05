CREATE TABLE students (
    student_id INTEGER NOT NULL AUTO_INCREMENT,
    registration_num INTEGER(15) NOT NULL,
    class_room VARCHAR(10) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    grade VARCHAR(10) NOT NULL,
    email VARCHAR(155) NOT NULL,
    password VARCHAR(25) NOT NULL,
    PRIMARY KEY (student_id)
);

INSERT INTO students (
    registration_num, 
    class_room, 
    fullname, 
    grade, 
    email, 
    password
 ) VALUES (?, ?, ?, ?, ?, ?)
 
