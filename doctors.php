<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Directory</title>
    <link rel="stylesheet" href="doctors.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="stylesheet" href="main.css">
     <link rel="stylesheet" href="normalize.css"> 
     


</head>
<body>
<?php 
     include('nav.php');
?>
<main>
    <div class="container">
        <div class="sidebar">
            <h1>Departments</h1>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search by name">
                <button id="searchButton">Search</button>
            </div>
            <ul id="departments"></ul>
           
        </div>
        <div class="main-content">
            <h2>Doctors</h2>
            <div id="doctors"></div>
        </div>

    </div>

  
</main>  
<?php
       include('footer.php');
    ?>


    <script src="doctors.js"></script>


</body>
</html>
