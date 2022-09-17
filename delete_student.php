<?php

include "includes/functions.php";


if(isset($_GET['id'])) {

    $customer_id = $_GET['id'];

    $result = mysqli_query($connection , "DELETE FROM students WHERE id = '{$customer_id}'");

    if(!$result){
        echo "Error Occurred ".mysqli_error($connection);
    } else {
        header('Location: ./students.php');
    }

}