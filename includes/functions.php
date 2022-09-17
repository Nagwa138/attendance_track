<?php

date_default_timezone_set('Africa/Cairo');


$host = "localhost";

$user = "root";

$password = "";

$db = "school";

$connection = mysqli_connect($host , $user , $password , $db);

if(!$connection){
    echo "Error Occurred ";
}


function isTodayTracked(){

    global $connection;

    //DB -> DAYS DATE == STATUS == 0 . NOT ELSE 1

    $track = false;

    $x = date('Y-m-d');

    $result = mysqli_query($connection , "SELECT * FROM days WHERE date = '{$x}' LIMIT 1");

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if($row['status'] == 0){
            $track = false;
        } else {
            $track = true;
        }

    } else {

        $query  = mysqli_query($connection , "INSERT INTO days (date) VALUES ('{$x}')");

        if(!$query){
            echo "Error Occurred !! ".mysqli_error($connection);
        } else {
            $track = false;
        }

    }

    return $track;

}


function getToDayID(){

    global $connection;

    //DB -> DAYS DATE == STATUS == 0 . NOT ELSE 1

    $x = date('Y-m-d');

    $result = mysqli_query($connection , "SELECT * FROM days WHERE date = '{$x}' LIMIT 1");

    if(mysqli_num_rows($result) < 1){

        $result  = mysqli_query($connection , "INSERT INTO days (date) VALUES ('{$x}')");

        if(!$result){

            echo "Error Occurred !! ".mysqli_error($connection);

        }

    }

    $row = mysqli_fetch_assoc($result);

    return $row['id'];

}

function isAttended($student_id, $attendance){

    $input_name = "attend_".$student_id;

    return $attendance[$input_name] ?: 0;

}
