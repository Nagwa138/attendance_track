<?php
session_start();

include "./includes/header.php";

include './includes/functions.php';


?>

<!-- Header-->
<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <?php

            if(isset($_SESSION['success'])){

        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            ?>
        </div>
                <?php

                unset($_SESSION['success']);
            }
                ?>

        <h1 class="fw-bolder">Welcome to Attendance Web App</h1>
        <p class="lead">A functional website for tracking students' Attendance</p>
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
<!-- About section-->
<section class="bg-light" id="services">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>About this page</h2>
                <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled
                    so you can use it as a boilerplate or starting point for you own landing page designs! This template
                    features:</p>
                <ul>
                    <li>Clickable nav links that smooth scroll to page sections</li>
                    <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                    <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar
                    </li>
                    <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php
include "./includes/footer.php";
?>