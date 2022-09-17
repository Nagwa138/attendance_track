<?php
include "includes/functions.php";
include "includes/header.php";
?>


<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Add New Student</h1>
    </div>
</header>
<section class="bg-light" id="services">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">

                <form action="add_student.php" style="margin:auto" class="col-8" enctype="multipart/form-data"
                    method="post">

                    <br>
                    <div class="from-group">

                        <input id="first_name" class="form-control" type="text" name="first_name"
                            placeholder="First Name" style="padding: 10px;">
                    </div>

                    <br>
                    <div class="input-group">

                        <input id="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name"
                            style="padding: 10px;">

                        <button class="input-group-btn btn btn-primary" name="form_sub" type="submit">
                            Save
                        </button>
                    </div>



                </form>
            </div>
        </div>



        <?php


if(isset($_POST['form_sub'])){


    $first = $_POST['first_name'];
    $last = $_POST['last_name'];

  $result = mysqli_query( $connection , "INSERT INTO students (first_name , last_name ) VALUES ('$first' , '$last')");

    if($result){
        header('Location: ./students.php');
    } else {
        echo "Error ".mysqli_error($connection);
    }

}

echo " </div> </section>";


include './includes/footer.php';
?>