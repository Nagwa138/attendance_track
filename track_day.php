<?php

include "./includes/header.php";

include "includes/functions.php";

?>

<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Day <?php echo  date('d-m-Y'); ?> Attendance </h1>
        <p class="lead">Today is <?php echo date("l") . '  ' . date('d-m-Y'); ?></p>
    </div>
</header>
<section class="bg-light" id="services">
    <div class="container">

        <?php 
            
//ADD TODAY -> DAYS
        if(isTodayTracked()){
            echo "
            <p class='text-center'> You can not take Attendance    </p>
            ";
        } else {
        ?>


        <form action="./track_day_action.php" method="post">

        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Attendant </th>
                    <th> Not </th>
                </tr>
            </thead>
            <tbody>
            <?php

                global $connection;

                $result = mysqli_query($connection, "SELECT * FROM students");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $row['first_name'] . ' ' . $row['last_name'];
                                    ?>
                                </td>
                                <td>
                                    <input type="radio" name="attend_<?php echo $row['id']; ?>" class="form-check" value="1" data-id="<?php echo $row['id']; ?>">
                                </td>
                                <td>
                                    <input type="radio" name="attend_<?php echo $row['id']; ?>" class="form-check" value="0" data-id="<?php echo $row['id']; ?>">
                                </td>
                            </tr>
                    <?php
                    }
                }else {
                    echo "<tr><td colspan='4' class='text-center'>No Students Exist</td></tr>";
                }
            ?>
            </tbody>
        </table>

            <button type="submit"
                    name="form_sub"
                    class="btn btn-outline-info col-12">
                Submit
            </button>

        </form>

        <?php
        
        }

        ?>
    </div>
</section>


<?php

include "./includes/footer.php";

?>