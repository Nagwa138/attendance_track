<?php
include "includes/functions.php";
include "includes/header.php";
?>


<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Edit Student Data</h1>
    </div>
</header>

<?php

if(isset($_GET['id'])){
    $student_id = $_GET['id'];

    //GET CUSTOMER FROM DB

    $select = mysqli_query($connection , "SELECT * FROM students WHERE id = '{$student_id}' LIMIT 1");

    if(!$select){
        echo "Error Occurred ".mysqli_error($connection);
    } else {
        //WHILE
        $row = mysqli_fetch_assoc($select);

        $f_name = $row['first_name'];
        $l_name = $row['last_name'];

     ?>
<section class="bg-light" id="services">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <form action="edit_student.php?id=<?php echo $row['id'];?>" style="margin:auto" method="post">

                    <!--    ID -> FIRST LAST  -->

                    <div class="form-group">
                        <label for="first_name" class="form-label">
                            First Name
                        </label>
                        <input id="first_name" type="text" value="<?php  echo $f_name;?>" name="first_name"
                            class="form-control" placeholder="First Name" style="padding: 10px;">
                    </div>

                    <br>

                    <input type="hidden" name="student_id" value="<?php  echo $row['id'];?>">

                    <div class="form-group">
                        <label for="last_name" class="form-label">
                            Last Name
                        </label>
                        <input id="last_name" value="<?php  echo $l_name;?>" type="text" name="last_name"
                            class="form-control" placeholder="Last Name" style="padding: 10px;">
                    </div>

                    <br>

                    <button name="form_sub" class="btn btn-primary col-12" type="submit">
                        Save
                    </button>

                </form>


            </div>
        </div>
    </div>
</section>

<?php

if(isset($_POST['form_sub'])){

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $id = $_POST['student_id'];


    $result = mysqli_query($connection , "UPDATE students SET first_name = '{$first}' , last_name = '{$last}' WHERE  id = '{$id}'");

    if(!$result){
        echo "Error Occurred ".mysqli_error($connection);
    } else {
        header('Location: ./students.php');
    }

}

    }

}
    
include "./includes/footer.php";
?>