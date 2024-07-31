<?php 
session_start();

include_once 'connection.php';

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'User Name'; // Check if name is set
$profile_pic_url = isset($_SESSION['image']) ? $_SESSION['image'] : 'default-pic.avif'; // Check if image is set and not empty

?> 


<nav class="navbar bg-blue">
    <div class="container flex">
        <a href="main.php" class="navbar-brand">
            <img src="elder.png" alt="site logo">
        </a>
        <button type="button" class="navbar-show-btn">
            <img src="menu-removebg-preview.png" alt="Menu">
        </button>

        <div class="navbar-collapse bg-white">
            <button type="button" class="navbar-hide-btn">
                <img src="close1437.jpg" alt="Close">
            </button>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="doctors.php" class="nav-link">Doctors</a>
                </li>
                <li class="nav-item">
                    <a href="Buy_Medicine.php" class="nav-link">Buy Medicine Online</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Physician</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="dropbtn">Login</button>
                        <i class="fa fa-caret-down"></i>
                        <div class="dropdown-content">
                            <a href="login.php">Login as User</a> 
                            <a href="admin.php">Login as Admin</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="./uploads/<?php echo $profile_pic_url;?>" alt="Profile Picture" class="user-profile-img" onclick="toggleMenu()">
                    </a>
                </li>
            </ul>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <form>  
                        <div class="user-info">
                            <img src="./uploads/<?php echo $profile_pic_url;?>" alt="User Profile Picture">
                            <h3><?php echo $name; ?></h3>
                        </div>
                        <hr>
                        <a href="profile.php" class="sub-menu-link">
                            <img src="image/profile.png" alt="Profile Icon">
                            <p>Edit Profile</p> <span></span>
                        </a>
                        <a href="#" class="sub-menu-link">
                            <img src="image/setting.png" alt="Settings Icon">
                            <p>Settings</p> <span></span>
                        </a>
                        <a href="logout.php" class="sub-menu-link">
                            <img src="image/logout.png" alt="Logout Icon">
                            <p>Log out</p> <span></span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
 
