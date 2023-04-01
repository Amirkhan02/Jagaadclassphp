CREATE DATABASE IF NOT EXISTS pdoapp;

USE pdoapp;

CREATE TABLE IF NOT EXISTS students (
    id VARCHAR(150) NOT NULL,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS courses(
    id VARCHAR(150) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    year INTEGER,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS students_courses (
    student_id VARCHAR(150) NOT NULL,
    course_id VARCHAR(150) NOT NULL,
    final_mark INTEGER,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
    );


INSERT INTO students VALUES ('8dd1fc39-3388-4d87-8e34-364848036490', 'hammed', 'sp');
INSERT INTO courses VALUES ('ff34a2ff-2f54-4c08-b094-7429f2646e34', 'php course', 'the best long', 2023);

INSERT INTO courses VALUES ('b0feceaf-a9c4-4adf-bf89-36f0a8911090', 'java script', 'not pro lang', 2023);

INSERT INTO students_courses VALUES ('8dd1fc39-3388-4d87-8e34-364848036490', 'ff34a2ff-2f54-4c08-b094-7429f2646e34', NULL);
INSERT INTO students_courses VALUES ('8dd1fc39-3388-4d87-8e34-364848036490', 'b0feceaf-a9c4-4adf-bf89-36f0a8911090', NULL);

/*
SELECT s.name, c.title, c.final_mark
FROM students AS s
JOIN students_courses AS sc ON sc.student_id=s.id
JOIN courses AS c ON c.id=sc.course_id

UPDATE students_courses SET final_mark=10
WHERE student_id='8dd1fc39-3388-4d87-8e34-364848036490'
AND courses_id='8dd1fc39-3388-4d87-8e34-364848036490'
 */