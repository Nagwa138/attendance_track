<?php

include "./includes/header.php";

include "includes/functions.php";

?>



<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Students List</h1>
        <p class="lead">Today is <?php echo date("l") . '  ' . date('d-m-Y'); ?></p>
        <a class="btn btn-lg btn-light" href='./add_student.php'>
            Add Student
        </a>
    </div>
</header>
<section class="bg-light" id="services">
    <div class="container">
        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th> ID </th>
                    <th> First </th>
                    <th> Last</th>
                    <th> Date </th>
                </tr>
            </thead>
            <tbody>
                <?php


global $connection;

$result = mysqli_query( $connection , "SELECT * FROM students");


// for
// foreach
// while
// do while



while( $row = mysqli_fetch_assoc($result) ){

    echo "<tr>"; 
    echo "<td>"; 
    echo $row['id'];
    echo "</td>"; 
    echo "<td>"; 
    echo $row['first_name'];
    echo "</td>"; 
    echo "<td>";
    echo $row['last_name']; 
    echo "</td>"; 
    echo "<td>"; 
    echo $row['date'];
    echo "</td>";
    echo "<td><a class='btn btn-warning' href='edit_student.php?id=".$row['id']."' >Edit</a> <a class='btn btn-dark'  href='delete_student.php?id=".$row['id']."' >Delete</a></td>";
    echo "</tr>";
  
    
    // print_r($row);

    // echo "end of row <br>"; 

}

?>
            </tbody>
        </table>
    </div>
</section>
<?php

include "./includes/footer.php";

?>