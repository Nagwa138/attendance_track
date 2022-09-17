<?php

include "./includes/header.php";

include "includes/functions.php";



//INERT READ UPDATE DELETE

// $result = mysqli_query( $connection , "SELECT * FROM students");


// // for
// // foreach
// // while
// // do while


// while( $row = mysqli_fetch_assoc($result) ){

//     echo "<tr>";
//     echo "<td>";
//     echo $row['id'];
//     echo "</td>";
//     echo "<td>";
//     echo $row['first_name'];
//     echo "</td>";
//     echo "<td>";
//     echo $row['last_name'];
//     echo "</td>";
//     echo "<td>";
//     echo $row['date'];
//     echo "</td>";
//     echo "<td><a class='btn btn-warning' href='edit_student.php?id=".$row['id']."' >Edit</a> <a class='btn btn-dark'  href='delete_student.php?id=".$row['id']."' >Delete</a></td>";
//     echo "</tr>";


//     // print_r($row);

//     // echo "end of row <br>";

// }


?>



<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Day <?php echo  date('d-m-Y'); ?> Attendance </h1>
        <p class="lead">Today is <?php echo date("l") . '  ' . date('d-m-Y'); ?></p>

    </div>
</header>
<?php

if(isset($_GET['id'])){

    global $connection;

    $day_id = $_GET['id'];

    $result = mysqli_query( $connection , "SELECT * FROM days WHERE id = '{$day_id}' LIMIT 1");

    if(mysqli_num_rows($result) > 0){
?>
<section class="bg-light" id="services">
    <div class="container">
        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>

                <?php


                     $result = mysqli_query( $connection , "SELECT * FROM attendance WHERE day_id = '{$day_id}'");

                     if(mysqli_num_rows($result) > 0){
                         while( $row = mysqli_fetch_assoc($result) ){

                             $student_result = mysqli_query( $connection , "SELECT * FROM students WHERE id = '{$row['student_id']}' LIMIT 1");

                             if(mysqli_num_rows($student_result) > 0)
                             {
                                 $student_row = mysqli_fetch_assoc($student_result);

                                 echo "<tr>";
                                 echo "<td>";
                                 echo $row['student_id'];
                                 echo "</td>";
                                 echo "<td>";
                                 echo $student_row['first_name'] . ' ' . $student_row['last_name'];
                                 echo "</td>";
                                 echo "<td>";
                                 echo $row['status'] == 1 ? 'Attended' : 'Not';
                                 echo "</td>";
                                 echo "</tr>";

                             }

                         }

                     } else {
                        echo '<tr><td colspan="3"> No Records found</td></tr>';
                     }

                    ?>
            </tbody>
        </table>
    </div>
</section>
<?php
    }
}
include "./includes/footer.php";

?>