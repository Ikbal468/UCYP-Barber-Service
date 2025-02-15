<?php
session_start();
include 'connect.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>UCYP University Barber Service</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse p-0">

                    <div class="position-sticky sidebar-sticky d-flex flex-column justify-content-center align-items-center">

                        <a href="#" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); margin-top: 20px; z-index: 10; padding: 10px; text-align: center; color: black; font-weight: bold; font-size: 25px;">
                            <i class="bx bxs-user"></i>
                            <span class="nav-item"><?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'Not found'; ?></span>
                        </a>

                        <a class="navbar-brand" href="http://localhost/UCYP%20Barber%20Service/index.php#">
                            <img src="images/UCYPBSLogo4.png" class="logo-image img-fluid" align="">
                        </a>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Our Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Product</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">Haircut</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Contact</a>
                            </li>
                        </ul>

                        <a href="loginBarber.php" style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); margin-bottom: 2px; z-index: 10; padding: 10px; text-align: center; color: black; font-weight: bold; font-size: 19px;">
                            <i class="bx bxs-log-out"></i>
                            <span class="nav-item">Log Out</span>
                        </a>

                    </div>
                </nav>
                
                <div class="col-md-8 ms-sm-auto col-lg-9 p-0">
                    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

                            <div class="container">
                                <div class="row">

                                    <div class="col-lg-8 col-12">
                                        <h1 class="text-white mb-lg-3 mb-4"><strong>UCYP University <em>Barber Service</em></strong></h1>
                                        <p class="text-black">Convenient Haircuts and Quality Grooming Products for UCYP Students</p>
                                        <br>
                                        <a class="btn custom-btn custom-border-btn custom-btn-bg-white smoothscroll me-2 mb-2" href="#section_2">About Us</a>

                                        <a class="btn custom-btn smoothscroll mb-2" href="#section_4">Haircut</a>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-block d-lg-flex flex-column justify-content-center align-items-center">
                                <img src="images/vintage-chair-barbershop.jpg" class="custom-block-image img-fluid" alt="">

                                <h4><strong class="text-white">Hurry Up! Get a good haircut.</strong></h4>

                                <a href="#booking-section" class="smoothscroll btn custom-btn custom-btn-italic mt-3">Book a seat</a>
                            </div>
                    </section>


                    <section class="about-section section-padding" id="section_2">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-12 mx-auto">
                                    <h2 class="mb-4">Haircut Service for UCYP Student</h2>

                                    <div class="border-bottom pb-3 mb-5">
                                        <p>At UCYP University, students often struggled with the hassle of booking haircut appointments and finding quality grooming products. Recognizing this need, we developed a dedicated web-based platform to streamline the process. Now, with just a few clicks, students can easily book their haircut appointments, purchase grooming essentials, and even provide feedback on their experiences.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="featured-section section-padding">
                        <div class="section-overlay"></div>
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-12 mx-auto text-center">
                                    
                                    <!-- Updated Text -->
                                    <h2 class="mb-3">Get the app now</h2>

                                    <!-- QR Code Image -->
                                    <img src="images/Snake Game APK.png" alt="QR Code" style="max-width: 200px; margin-bottom: 20px;">
                    
                                    <p>Scan the QR code above to download the app</p>
                    
                                    <strong>UCYP University Barber Service App</strong>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="services-section section-padding" id="section_3">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-12 col-12">
                                    <h2 class="mb-5">Products</h2>
                                </div>

                                <div class="col-lg-6 col-12 mb-4">
                                    <a href="productRetrobee.php">
                                    <div class="services-thumb">
                                        <img src="images/services/Retrobee-Barber-Pomade-01.jpg" class="services-image img-fluid" alt="">

                                        <div class="services-info d-flex align-items-end">
                                            <h4 class="mb-0">Retrobee</h4>

                                            <strong class="services-thumb-price" style="background-color: #d6a354; color: black; padding: 5px 10px; border-radius: 5px;">
                                                RM 40.00
                                            </strong>
                                        </div>
                                    </div>
                                    </a>
                                </div>


                                <div class="col-lg-6 col-12 mb-4">
                                    <a href="productSuavecito.php">
                                    <div class="services-thumb">
                                        <img src="images/services/85935d2529884090bfc956235dd0fc8a.jpg" class="services-image img-fluid" alt="">

                                        <div class="services-info d-flex align-items-end">
                                            <h4 class="mb-0">Suavecito</h4>

                                            <strong class="services-thumb-price" style="background-color: #d6a354; color: black; padding: 5px 10px; border-radius: 5px;">
                                                RM 25.00
                                            </strong>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                                    <a href="productHipster.php">
                                    <div class="services-thumb">
                                        <img src="images/services/2b1eeac402d40569357be4a502b32f32.jpg" class="services-image img-fluid" alt="">

                                        <div class="services-info d-flex align-items-end">
                                            <h4 class="mb-0">Hipster</h4>

                                            <strong class="services-thumb-price" style="background-color: #d6a354; color: black; padding: 5px 10px; border-radius: 5px;">
                                                RM 20.00
                                            </strong>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <a href="productMagnum.php">
                                    <div class="services-thumb">
                                        <img src="images/services/f1caf5_7e45858d88044fc08d372e4476e2eadc~mv2.jpg" class="services-image img-fluid" alt="">

                                        <div class="services-info d-flex align-items-end">
                                            <h4 class="mb-0">Magnum</h4>

                                            <strong class="services-thumb-price" style="background-color: #d6a354; color: black; padding: 5px 10px; border-radius: 5px;">
                                                RM 30.00
                                            </strong>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </section>

                    


                    <section class="price-list-section section-padding" id="section_4">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-8 col-12">
                                    <div class="price-list-thumb-wrap">
                                        <div class="mb-4">
                                            <h2 class="mb-2">Price List</h2>

                                            <strong>Starting at RM 5.00</strong>
                                        </div>

                                        <div class="price-list-thumb">
                                            <h6 class="d-flex">
                                                Uppercut
                                                <span class="price-list-thumb-divider"></span>

                                                <strong>RM 7.00</strong>
                                            </h6>
                                        </div>

                                        <div class="price-list-thumb">
                                            <h6 class="d-flex">
                                                Mid Fade
                                                <span class="price-list-thumb-divider"></span>

                                                <strong>RM 6.00</strong>
                                            </h6>
                                        </div>

                                        <div class="price-list-thumb">
                                            <h6 class="d-flex">
                                                Low Fade
                                                <span class="price-list-thumb-divider"></span>

                                                <strong>RM 6.00</strong>
                                            </h6>
                                        </div>

                                        <div class="price-list-thumb">
                                            <h6 class="d-flex">
                                                Buzz Cut
                                                <span class="price-list-thumb-divider"></span>

                                                <strong>RM 8.00</strong>
                                            </h6>
                                        </div>

                                        <div class="price-list-thumb">
                                            <h6 class="d-flex">
                                                Mullet
                                                <span class="price-list-thumb-divider"></span>

                                                <strong>RM 5.00</strong>
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 custom-block-bg-overlay-wrap mt-5 mb-5 mb-lg-0 mt-lg-0 pt-3 pt-lg-0">
                                    <a href="gallery.html">
                                        <img src="images/vintage-chair-barbershop.jpg" class="custom-block-bg-overlay-image img-fluid" alt="">
                                    </a>
                                    <p style="text-align: center; font-weight: bold; margin-top: 30px; color: black;">Haircut Gallery</p>
                                </div>

                                <a href="#booking-section" class="smoothscroll btn custom-btn custom-btn-italic mt-3">Book a seat</a>

                            </div>
                        </div>
                    </section>


                    <section class="booking-section section-padding" id="booking-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-12 mx-auto">
                                    <form action="connect.php" method="post" class="custom-form booking-form" id="bb-booking-form" role="form">
                                        <div class="text-center mb-5">
                                            <h2 class="mb-1">Book a seat</h2>
                                            <p>Please fill out the form and we get back to you</p>
                                        </div>

                                        <div class="booking-form-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="bb-name" id="bb-name" class="form-control" placeholder="Fullname" value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="tel" class="form-control" name="bb-phone" placeholder="Mobile 0112345678" pattern="[0-9]{10,11}" value="01<?php echo isset($_SESSION['phoneNumber']) ? substr($_SESSION['phoneNumber'], 1) : ''; ?>" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="email" name="bb-email" id="bb-email" class="form-control" placeholder="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <input type="date" name="bb-date" id="bb-date" class="form-control" required>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <select class="form-control" name="bb-time" id="bb-time" required>
                                                        <option value="">Select Time</option>
                                                        <!-- Time slots will be dynamically populated here -->
                                                    </select>
                                                </div>

                                                <div class="col-lg-6 col-12">
                                                    <select class="form-select form-control" name="bb-haircut" id="bb-haircut" aria-label="Default select example" required>
                                                        <option value="">Select Haircut</option>
                                                        <option value="Uppercut">Uppercut</option>
                                                        <option value="Mid Fade">Mid Fade</option>
                                                        <option value="Low Fade">Low Fade</option>
                                                        <option value="Buzz Cut">Buzz Cut</option>
                                                        <option value="Mullet">Mullet</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <textarea name="bb-message" rows="3" class="form-control" id="bb-message" placeholder="Comment (Optionals)"></textarea>

                                            <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                                <button type="submit" name="bookAppointment" class="form-control">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                    <script>
                        // Function to fetch available times based on the selected date
                        document.getElementById('bb-date').addEventListener('change', function() {
                            const selectedDate = this.value;
                            const timeSelect = document.getElementById('bb-time');

                            // Clear previous options
                            timeSelect.innerHTML = '<option value="">Select Time</option>';

                            // Make an AJAX request to fetch available times
                            fetch('checkAvailableTimes.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: 'selectedDate=' + encodeURIComponent(selectedDate)
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Populate the time dropdown with available times
                                for (const time in data) {
                                    const option = document.createElement('option');
                                    option.value = time;
                                    option.textContent = data[time];
                                    timeSelect.appendChild(option);
                                }
                            })
                            .catch(error => console.error('Error fetching available times:', error));
                        });
                    </script>


                <section class="contact-section" id="section_5">
                    <div class="section-padding section-bg">
                        <div class="container">
                            <div class="row">   

                                <div class="col-lg-8 col-12 mx-auto">
                                    <h2 class="text-center">Say hello</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-padding">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-6 col-12">
                                    <h5 class="mb-3"><strong>Contact</strong> Information</h5>

                                    <p class="text-white d-flex mb-1">
                                        <a href="tel: 011-25486248" class="site-footer-link">
                                            (+60) 
                                            011-25486248
                                        </a>
                                    </p>

                                    <p class="text-white d-flex">
                                        <a href="ucypbarberservice@gmail.com" class="site-footer-link">
                                            ucypbarberservice@gmail.com
                                        </a>
                                    </p>

                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="https://www.tiktok.com/@iqball_468?_t=8oe6VU7GkYi&_r=1" class="social-icon-link bi-tiktok">
                                            </a>
                                        </li>
            
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter">
                                            </a>
                                        </li>
            
                                        <li class="social-icon-item">
                                            <a href="https://www.instagram.com/iqbal_468?igsh=MTV2cmozNjhzbHF2Mw==" class="social-icon-link bi-instagram">
                                            </a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-youtube">
                                            </a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="https://wa.link/6nou0w" class="social-icon-link bi-whatsapp">
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-lg-5 col-12 contact-block-wrap mt-5 mt-lg-0 pt-4 pt-lg-0 mx-auto">
                                    <div class="contact-block">
                                        <h6 class="mb-0">
                                            <i class="custom-icon bi-shop me-3"></i>

                                            <strong>Open Daily</strong>

                                            <span class="ms-auto">6:00 PM - 10:00 PM</span>
                                        </h6>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12 mx-auto mt-5 pt-5">
                                    <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.1406985183203!2d103.3235658749741!3d3.779550696194302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31c8b1ba2fcf8e73%3A0x57d3895f29081c06!2sUCYP%20University!5e0!3m2!1sms!2smy!4v1723256678714!5m2!1sms!2smy" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                
                <footer class="site-footer">
                    
                    <div class="container">
                        <h2>Your Feedback</h2>
                        <form action="connect.php" method="post">
                    
                            <textarea id="feedback" name="feedback" placeholder="Write something.." style="height:150px; width:100%; max-width:700px;" required></textarea>
                    
                            <input type="submit" name="submitFeedback" value="Submit">
                        </form>
                    </div>


                    <div class="site-footer-bottom">
                        <div class="container">
                            <div class="row align-items-center">

                                <div class="col-lg-8 col-12 mt-4">
                                    <p class="copyright-text mb-0">Copyright © 2024 UCYP University Barber Service 
                                </div>

                                <div class="col-lg-2 col-md-3 col-3 mt-lg-4 ms-auto">
                                    <a href="#section_1" class="back-top-icon smoothscroll" title="Back Top">
                                        <i class="bi-arrow-up-circle"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>