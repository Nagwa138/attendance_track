<?php

include "includes/functions.php";


if(isset($_GET['id'])) {

    $customer_id = $_GET['id'];



    // $select = mysqli_query($connection , "SELECT * FROM students WHERE id = '{$customer_id}' LIMIT 1");

    // if(!$select){
    //     echo "Error Occurred ".mysqli_error($connection);
    // } else {
    //     //WHILE
    //     $row = mysqli_fetch_assoc($select);

    //     $image = $row['image'];


    //     unlink('students_images/' . $image);
    // }


    $result = mysqli_query($connection , "DELETE FROM students WHERE id = '{$customer_id}'");

    if(!$result){
        echo "Error Occurred ".mysqli_error($connection);
    } else {
        header('Location: ./students.php');
    }

}