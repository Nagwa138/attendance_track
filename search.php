<?php

include "./includes/header.php";
?>



<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Students List</h1>
        <p class="lead">A functional website for tracking students' Attendance</p>
        <a class="btn btn-lg btn-light" href='./add_student.php'>
            Add Student
        </a>
    </div>
</header>

<section class="bg-light" id="services">
    <div class="container">

        <?php

global $connection;
            if(isset($_POST['form_sub'])){
                $search =  $_POST['search'];


                include "includes/functions.php";


                $query = mysqli_query($connection , "SELECT * FROM students WHERE first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%'");


                if(mysqli_num_rows($query) > 0 ){
                    //SHOW DATA
            ?>


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



                        while( $row = mysqli_fetch_assoc($query) ){

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
                            echo "<td><a class='btn btn-warning' href='edit_student.php?id=".$row['id']."' >Edit</a><a class='btn btn-dark'  href='delete_student.php?id=".$row['id']."' >Delete</a></td>";
                            echo "</tr>";
                        
                            
                            // print_r($row);

                            // echo "end of row <br>"; 

                        }

                        ?>
            </tbody>
        </table>

        <?php

    } else { 
        echo " Sorry, No Records Matching this name !";
    }




}

echo " </div>
</section>
";

include './includes/footer.php';
?>