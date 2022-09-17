<?php

include "./includes/header.php";

include "./includes/functions.php";

?>


<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Day Tracked</h1>
        <p class="lead">Today is <?php echo date("l") . '  ' . date('d-m-Y'); ?></p>


        <?php

            if( isTodayTracked()){
                echo "Today Tracked !!";
            } else {
                
                echo  '<a class="btn btn-lg btn-light" href="./track_day.php">
                        Take Today Attendance
                    </a>';
            }

        ?>

    </div>
</header>
<section class="bg-light" id="services">
    <div class="container">
        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th> ID </th>
                    <th> Date </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $result = mysqli_query( $connection , "SELECT * FROM days");

                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){

            ?>
                <tr>
                    <td>
                        <?php
                        echo $row['id'];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row['date'];
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-success" href="./view_day.php?id=<?php echo $row['id']; ?>">
                            View
                        </a>
                    </td>
                </tr>
                <?php

                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No Days Tracked yet !</td></tr>";

                }

?>
            </tbody>
        </table>
    </div>
</section>
<?php

include "./includes/footer.php";

?>