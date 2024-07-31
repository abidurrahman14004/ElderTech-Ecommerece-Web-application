
<?php 
session_start();

include_once 'connection.php';

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'User Name'; // Check if name is set
$profile_pic_url = isset($_SESSION['image']) ? $_SESSION['image'] : 'default-pic.avif'; // Check if image is set and not empty

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElderTech BD</title>

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link rel="stylesheet" href="normalize.css"> 
   
    <link rel="stylesheet" href="main.css">

</head>
<body>
<header class="header bg-blue">
    <nav class="navbar bg-blue">
            <div class="container flex">
                <a href="main.php" class="navbar-brand">
                    <img src="elder.png" alt="site logo">
                </a>
                <button type="button" class="navbar-show-btn">
                    <img src="menu-removebg-preview.png">
                </button>

                <div class="navbar-collapse bg-white">
                    <button type="button" class="navbar-hide-btn">
                        <img src="close1437.jpg">
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
                        
                       <img src="./uploads/<?php echo $profile_pic_url;?>" alt="Profile Picture" class= "user-profile-img" onclick="toggleMenu()">
                    </a>
                       </li>
                    </ul>
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <form>  
                                <div class="user-info">

                                <img src="./uploads/<?php echo $profile_pic_url;?>">
                                    <h3> <?php echo $name; ?> </h3>
                            
                                </div>
                                <hr>
                                <a href="profile.php" class="sub-menu-link">
                                <img src="image/profile.png">
                                    <p>Edit Profile</p> <span> </span>
                                </a>
                                <a href="#" class="sub-menu-link">
                                    <img src="image/setting.png">
                                    <p>Settings</p> <span> </span>
                                </a>
                                <a href="logout.php" class="sub-menu-link">
                                <img src="image/logout.png">
                                    <p>Log out</p> <span> </span>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav >
        <div class="header-inner text-white text-center">
    <div class="container grid">
        <div class="header-inner-left">
            <h1>Your most trusted <br> <span>health partner</span></h1>
            <p class="lead">the best match services for you</p>
            <p class="text text-md">A dedicated platform to serve the senior citizens. We provide the best service for you.</p>
            <div class="btn-group">


                <a href="#" class="btn btn-white">Learn More</a>
                <a href="Register.php" class="btn btn-light-blue">Register</a>
            </div>
        </div>
        <div class="header-inner-right">
            <img src="doctor-img.jpg">
        </div>
    </div>
</div>

    </header>


    <main>
   
        <section id = "about" class = "about py">
            <div class = "about-inner">
                <div class = "container grid">
                    <div class = "about-left text-center">
                        <div class = "section-head">
                            <h2>About Us</h2>
                            <div class = "border-line"></div>
                        </div>
                        <p class = "text text-lg">Eledertech is a pioneering company at the forefront of sustainable energy solutions. Specializing in cutting-edge renewable technologies, Eledertech is committed to revolutionizing the way we power our world. Through innovative research and development, they produce state-of-the-art solar panels, wind turbines, and energy storage systems. Eledertech's dedication to environmental stewardship is evident in their products, which offer efficient and eco-friendly alternatives to traditional energy sources. </p>
                        <a href = "#" class = "btn btn-white">Learn More</a>
                    </div>
                    <div class = "about-right flex">
                        <div class = "img">
                            <img src = "about-img.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>
  
        <section id = "banner-one" class = "banner-one text-center">
            <div class = "container text-white">
                <blockquote class = "lead"><i class = "fas fa-quote-left"></i> We should be concerned not only about the health of individual patients,but also the health of our entire society. <i class = "fas fa-quote-right"></i></blockquote>
                <small class = "text text-sm">- Ben Carson</small>
            </div>
        </section>
     
        <section id = "services" class = "services py">
            <div class = "container">
                <div class = "section-head text-center">
                    <h2 class = "lead">The Best Doctor gives the least medicines</h2>
                    <p class = "text text-lg">A perfect way to show your hospital services</p>
                    <div class = "line-art flex">
                        <div></div>
                        <img src = "med.jpg">
                        <div></div>
                    </div>
                </div>
                <div class = "services-inner text-center grid">
                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "service-icon-1.png">
                        </div>
                        <h3> Physician</h3>
                        <p class = "text text-sm">Our network includes dedicated healthcare professionals who prioritize the comfort and convenience of seniors. Whether it's medical check-ups, consultations, or specialized treatments, our physicians are equipped to deliver quality care in the comfort of the client's home. Ensure your loved ones receive the personalized attention they deserve with our trusted network of home healthcare providers.</p>
                    </article>

                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "service-icon-2.png">
                        </div>
                        <h3>Medical Treatment</h3>
                        <p class = "text text-sm">Our network consists of dedicated healthcare professionals who prioritize the well-being and convenience of seniors. Whether it's administering medications, conducting medical procedures, or offering specialized therapies, our physicians are equipped to deliver comprehensive medical care tailored to the unique needs of each patient. Ensure your loved ones receive the highest quality treatment without the hassle of travel with our trusted network of home healthcare providers.</p>
                    </article>

                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "service-icon-3.png">
                        </div>
                        <h3>Emergency Help</h3>
                        <p class = "text text-sm">Access emergency medical assistance for elderly individuals in the comfort of their homes through our specialized platform. Our network comprises skilled physicians who prioritize rapid response and compassionate care for seniors in urgent situations. Whether it's sudden illness, injury, or medical crises, our physicians are equipped to provide immediate assistance and stabilize the situation. Ensure peace of mind for your loved ones.</p>
                    </article>

                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "service-icon-4.png">
                        </div>
                        <h3>First Aid</h3>
                        <p class = "text text-sm">In hospital systems, first aid is the initial medical assistance provided to patients upon arrival, aimed at stabilizing their condition. Highly trained healthcare professionals swiftly assess and address urgent medical needs to ensure the best possible outcomes for patients. With specialized equipment and protocols in place, hospitals prioritize rapid and effective first aid interventions.</p>
                    </article>
                </div>
            </div>
        </section>
     
        <section id = "banner-two" class = "banner-two text-center">
            <div class = "container grid">
                <div class = "banner-two-left">
                    <img src = "banner-2-img.png">
                </div>
                <div class = "banner-two-right">
                    <p class = "lead text-white">When you are young and healthy, it never occurs to you that in a single second your whole life could change.</p>
                    <div class = "btn-group">
                        <a href = "#" class = "btn btn-white">Learn More</a>
                        <a href = "registration.php" class = "btn btn-light-blue">Registration Now</a>
                    </div>
                </div>
            </div>
        </section>
     
        <section id = "doc-panel" class = "doc-panel py">
            <div class = "container">
                <div class = "section-head">
                    <h2>Our Doctor Panel</h2>
                </div>

                <div class = "doc-panel-inner grid">
                    <div class = "doc-panel-item">
                        <div class = "img flex">
                            <img src = "doc-1.jpeg" alt = "doctor image">
                            <div class = "info text-center bg-blue text-white flex">
                                <p class = "lead">Abidur Rahman</p>
                                <p class = "text-lg">Medicine</p>
                            </div>
                        </div>
                    </div>

                    <div class = "doc-panel-item">
                        <div class = "img flex">
                            <img src = "doc-2.jpg" alt = "doctor image">
                            <div class = "info text-center bg-blue text-white flex">
                                <p class = "lead">Abdur Rafiu</p>
                                <p class = "text-lg">Physician</p>
                            </div>
                        </div>
                    </div>

                    <div class = "doc-panel-item">
                        <div class = "img flex">
                            <img src = "doc-4.jpg" alt = "doctor image">
                            <div class = "info text-center bg-blue text-white flex">
                                <p class = "lead">Emon Mahmud</p>
                                <p class = "text-lg">Medicine</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id = "package-service" class = "package-service py text-center">
            <div class = "container">
                <div class = "package-service-head text-white">
                    <h2>Package Service</h2>
                    <p class = "text text-lg">Best service package for you</p>
                </div>
                <div class = "package-service-inner grid">
                    <div class = "package-service-item bg-white">
                        <div class = "icon flex">
                            <i class = "fas fa-phone fa-2x"></i>
                        </div>
                        <h3>Regular Case</h3>
                        <p class = "text text-sm">To schedule an appointment at the hospital for a regular case, please call our appointment hotline during business hours or use our online appointment booking system. Be prepared to provide your personal information, including your name, contact details, and a brief description of the reason for your visit. Our staff will assist you in selecting a suitable date and time for your appointment with the appropriate healthcare provider. </p>
                        <a href = "#" class = "btn btn-blue">Read More</a>
                    </div>

                    <div class = "package-service-item bg-white">
                        <div class = "icon flex">
                            <i class = "fas fa-calendar-alt fa-2x"></i>
                        </div>
                        <h3>Serious Case</h3>
                        <p class = "text text-sm">For urgent or serious cases requiring immediate attention, please dial our emergency hotline or proceed directly to the hospital's emergency department. Provide all relevant personal and medical information promptly upon arrival to expedite care. Our experienced medical team is available 24/7 to provide immediate assistance and prioritize your needs.</p>
                        <a href = "#" class = "btn btn-blue">Read More</a>
                    </div>
                    
                    <div class = "package-service-item bg-white">
                        <div class = "icon flex">
                            <i class = "fas fa-comments fa-2x"></i>
                        </div>
                        <h3>Emergency Case</h3>
                        <p class = "text text-sm">In case of a medical emergency, please dial our emergency hotline or proceed directly to the hospital's emergency department. Provide all pertinent personal and medical details upon arrival to facilitate swift and appropriate care. Our dedicated emergency medical team is available around the clock to provide prompt assistance and address your urgent healthcare needs.</p>
                        <a href = "#" class = "btn btn-blue">Read More</a>
                    </div>
                </div>
            </div>
        </section>

        <section id = "posts" class = "posts py">
            <div class = "container">
                <div class = "section-head">
                    <h2>Latest Post</h2>
                </div>
                <div class = "posts-inner grid">
                    <article class = "post-item bg-white">
                        <div class = "img">
                            <img src = "doc-2.jpg">
                        </div>
                        <div class = "content">
                            <h4>Inspiring stories of person and family centered care during a global pandemic.</h4>
                           
                            <p class = "text text-sm">In the throes of the pandemic, Nurse Maria's dedication to person and family-centered care shone brightly. Assigned to care for an elderly patient, Maria noticed the loneliness weighing heavily on him due to visitor restrictions. Determined to make a difference, she went above and beyond, arranging video calls with his family, playing his favorite music, and sharing stories during her shifts.</p>
                            <div class = "info flex">
                                <small class = "text text-sm"><i class = "fas fa-clock"></i> March 7, 2024</small>
                                <small class = "text text-sm"><i class = "fas fa-comment"></i> 10 comments</small>
                            </div>
                        </div>
                    </article>

                    <article class = "post-item bg-white">
                        <div class = "img">
                            <img src = "doc-2.jpg">
                        </div>
                        <div class = "content">
                            <h4>Telemedicine and Remote Monitoring for Seniors</h4>
                            <p class = "text text-sm">Do you know how telehealth platforms enable seniors to consult with healthcare providers remotely via video conferencing, receive timely medical advice, refill prescriptions, and access specialist care without the need for frequent hospital visits. Additionally, the discussion may explore the integration of remote monitoring devices, such as connected blood pressure cuffs, glucometers, and digital scales, into home care routines to track vital signs, medication adherence, and disease progression. </p>
                            
                            <div class = "info flex">
                                <small class = "text text-sm"><i class = "fas fa-clock"></i> March 21, 2021</small>
                                <small class = "text text-sm"><i class = "fas fa-comment"></i> 3 comments</small>
                            </div>
                        </div>
                    </article>

                    <article class = "post-item bg-white">
                        <div class = "img">
                            <img src = "doc-3.jpg">
                        </div>
                        <div class = "content">
                            <h4>Advancements in Wearable Health Tech for Seniors</h4>
                            <p class = "text text-sm">This topic delves into the latest developments in wearable technology specifically designed to cater to the health needs of elderly individuals. It explores how devices such as smartwatches, fitness trackers, and other wearable gadgets are being equipped with features like fall detection, heart rate monitoring, blood pressure tracking, and even medication reminders to help seniors manage their health more effectively.</p>
                           
                            <div class = "info flex">
                                <small class = "text text-sm"><i class = "fas fa-clock"></i> February 27, 2024</small>
                                <small class = "text text-sm"><i class = "fas fa-comment"></i> 5 comments</small>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
       
        <section id = "contact" class = "contact py">
            <div class = "container grid">
                <div class = "contact-left">
                   
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7269.031649187759!2d88.628942!3d24.363353!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbefd0a55ea957%3A0x2f9cac3357d62617!2sRajshahi%20University%20of%20Engineering%20%26%20Technology!5e0!3m2!1sen!2sus!4v1711880489300!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class = "contact-right text-white text-center bg-blue">
                    <div class = "contact-head">
                        <h3 class = "lead">Contact Us</h3>
                        <p class = "text text-md">You can contact us from anywhere.</p>
                    </div>
                    <form>
                        <div class = "form-element">
                            <input type = "text" class = "form-control" placeholder="Your name">
                        </div>
                        <div class = "form-element">
                            <input type = "email" class = "form-control" placeholder="Your email">
                        </div>
                        <div class = "form-element">
                            <textarea rows = "5" placeholder="Your Message" class = "form-control"></textarea>
                        </div>
                        <button type = "submit" class = "btn btn-white btn-submit">
                            <i class = "fas fa-arrow-right"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </section>
     
    </main>

 
    <footer id = "footer" class = "footer text-center">
        <div class = "container">
            <div class = "footer-inner text-white py grid">
                <div class = "footer-item">
                    <h3 class = "footer-head">about us</h3>
                    <div class = "icon">
                        <img src = "elder.png">
                    </div>
                    <p class = "text text-md">We are here for you </p>
                    <address>
                         <br>
                        Kajla,Motihar <br>
                        Rajshahi University of Engineering and Technology <br>
                        Bangladesh
                    </address>
                </div>

                <div class = "footer-item">
                    <h3 class = "footer-head">tags</h3>
                    <ul class = "tags-list flex">
                        <li>medical care</li>
                        <li>emergency</li>
                        <li>therapy</li>
                        <li>surgery</li>
                        <li>medication</li>
                        <li>nurse</li>
                    </ul>
                </div>

                <div class = "footer-item">
                    <h3 class = "footer-head">Quick Links</h3>
                    <ul>
                        <li><a href = "#" class = "text-white">Our Services</a></li>
                        <li><a href = "#" class = "text-white">Our Plan</a></li>
                        <li><a href = "#" class = "text-white">Privacy Policy</a></li>
                        <li><a href = "#" class = "text-white">Appointment Schedule</a></li>
                    </ul>
                </div>

                <div class = "footer-item">
                    <h3 class = "footer-head">make an appointment</h3>
                    <p class = "text text-md">You can make appoinments in the following schedule</p>
                    <ul class = "appointment-info">
                        <li>8:00 AM - 11:00 AM</li>
                        <li>2:00 PM - 05:00 PM</li>
                        <li>8:00 PM - 11:00 PM</li>
                        <li>
                            <i class = "fas fa-envelope"></i>
                            <span>eldertechbd@gmail.com</span>
                        </li>
                        <li>
                            <i class = "fas fa-phone"></i>
                            <span>+8801305783402</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class = "footer-links">
                <ul class = "flex">
                    <li><a href = "https://www.facebook.com/sadikrahman.47695/" class = "text-white flex"> <i class = "fab fa-facebook-f"></i></a></li>
                    <li><a href = "#" class = "text-white flex"> <i class = "fab fa-twitter"></i></a></li>
                    <li><a href = "https://www.linkedin.com/in/abidurrahman47/" class = "text-white flex"> <i class = "fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src = "script.js"></script>
</body>
</html>