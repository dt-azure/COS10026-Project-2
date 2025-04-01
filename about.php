<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Company Introduction - Pawsome Studio">
    <title>Pawsome Studio - About Us</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Header -->
     <?php include 'header.php'; ?>

    <!-- About Section -->
    <section class="about-section">
        <h1>About Us</h1>
        <p>We are a team of passionate developers working on innovative projects.</p>
    </section>

    <!-- Group Info -->
    <section class="group-info">
        <div class="group-card">
            <h2>Group Details</h2>
            <p><strong>Group Name:</strong>The Pawsome Studio</p>
            <p><strong>Tutor’s Name:</strong> Mr. Trung Nguyen</p>
        </div>
    </section>
    
    <!-- Members Contribution -->
    <section class="team-section">
        <div class="about-container">
            <h2>Members Contribution</h2>
            <div class="team-container">
                <div class="team-member">
                    <a href="#member1">
                        <img src="images/phu.jpg" alt="Portrait of Truong Gia Phu">
                        <h2>Truong Gia Phu</h2>
                    </a>
                    <p class="title"><strong>Front-end: </strong> Designing and optimizing the apply.php and about.php section</p>
                    <p class="title"><strong>Back-end: </strong> Responsible for manage.php file that allows managers to view and manipulate data; providing sql code for jobs table creation and examples for testing purposes</p>

                </div>
                <div class="team-member">
                    <a href="#member2">
                        <img src="images/trung.jpg" alt="Portrait of Nguyen Duc Trung">
                        <h2>Nguyen Duc Trung</h2>
                    </a>
                    <p class="title"><strong>Front-end: </strong>Designing and optimizing the index.php section</p>
                    <p class="title"><strong>Back-end: </strong>Initializing, formating, testing, and adding record validation to EOI table and user table; enabling user login-logout and authentication  </p>

                </div>
                <div class="team-member">
                    <a href="#member3">
                        <img src="images/thai.jpg" alt="Portrait of Nguyen Xuan Thai">
                        <h2>Nguyen Xuan Thai</h2>
                    </a>
                    <p class="title"><strong>Front-end: </strong>Designing the jobs.php and updating about.php  </p>
                    <p class="title"><strong>Back-end: </strong>Allowing jobs.php file to retrieve job data and displaying them to web browsers; modularising web content  </p>     
                  </div>
            </div>
        </div>
    </section>

    <!-- POPUP MODALS -->
    <div class="popup" id="member1">
        <div class="popup-content">
            <a href="#" class="close-area"></a>
            <h2>Truong Gia Phu</h2>
            <p><b>School:</b> Swinburne University of Technology</p>
            <p><b>Major:</b> Data Science</p>
            <p><b>Strengths:</b> Power BI, Excel, SQL</p>
            <p><b>Hobby:</b> Play sport, listen to music</p>
        </div>
    </div>

    <div class="popup" id="member2">
        <div class="popup-content">
            <a href="#" class="close-area"></a>
            <h2>Nguyen Duc Trung</h2>
            <p><b>School:</b> Swinburne University of Technology</p>
            <p><b>Major:</b> Software Development</p>
            <p><b>Strengths:</b> Python, machine learning</p>
            <p><b>Hobby:</b> Play video games</p>
        </div>
    </div>

    <div class="popup" id="member3">
        <div class="popup-content">
            <a href="#" class="close-area"></a>
            <h2>Nguyen Xuan Thai</h2>
            <p><b>School:</b> Swinburne University of Technology</p>
            <p><b>Major:</b> Cyber Security</p>
            <p><b>Strengths:</b> Network Security, Risk Assessment</p>
            <p><b>Hobby:</b> Running, swimming</p>
        </div>
    </div>


    <!-- Studio Campus -->
    <section class="photo-section">
        <div class="photo-text">
            <h2>Location</h2>
            <p>
                Our team is based at Swinburne University of Technology, a leading institution known for innovation 
                and research excellence. This location provides us with access to cutting-edge resources, 
                a vibrant learning environment, and collaboration opportunities with industry experts. 
                The university's modern campus fosters creativity and teamwork, allowing us to develop 
                groundbreaking projects in software development, cybersecurity, and artificial intelligence.
            </p>
        </div>
        
        <div class="photo-container">
            <figure>
                <img src="images/swb.jpg" alt="Our Team's Location">
            </figure>
        </div>
    </section>
    
    
    

    <!-- Timetable -->
    <section class="timetable-section">
        <div class="about-container">
            <h2>Group Timetable</h2>
            <table>
                <tr>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Activity</th>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td>10:00 AM - 12:00 PM</td>
                    <td>Team Meeting</td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>2:00 PM - 4:00 PM</td>
                    <td>Development Session</td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>3:00 PM - 5:00 PM</td>
                    <td>Project Review</td>
                </tr>
            </table>
        </div>
    </section>


    <!-- Footer -->
     <?php include 'footer.php'; ?>

</body>
</html>
