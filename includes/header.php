<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Attendance App</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="./">
                Attendance Control
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="./students.php">Students</a></li>
                    <li class="nav-item"><a class="nav-link" href="./days.php">Days</a></li>


                </ul>

                <form action="search.php" method="post" class="d-flex">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-primary" name="form_sub" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>