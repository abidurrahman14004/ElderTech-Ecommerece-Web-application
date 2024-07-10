<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Directory</title>
    <link rel="stylesheet" href="doctors.css">
</head>
<body>
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
    <script src="doctors.js"></script>

</body>
</html>
