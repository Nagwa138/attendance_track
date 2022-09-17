<?php
session_start();

include './includes/functions.php';

if(isset($_POST['form_sub'])){

    global $connection;

    $day_id = getToDayID();

    $students = mysqli_query($connection , "SELECT * FROM students");

    if(mysqli_num_rows($students) > 0){

        while ($students_rows = mysqli_fetch_assoc($students)){

            $is_attended = isAttended($students_rows['id'], $_POST);

           $attend_student = mysqli_query($connection , "INSERT INTO attendance (student_id, day_id, status) VALUES ('{$students_rows['id']}', '{$day_id}', '{$is_attended}')");

            if(!$attend_student){
                echo "Error Occured" . mysqli_error($connection);
            }
        }

        mysqli_query($connection , "UPDATE days SET status = 1 WHERE id = '{$day_id}'");

    }

    //TODO :: GO TO HOME

    $_SESSION['success'] = "Attendance Tracked Successfully !";

    header('Location: ./index.php');

    exit();

}