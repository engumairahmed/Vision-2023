<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MedCustodian-Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset("images/logo.png")}}" rel="icon">
  <link href="{{asset("images/logo.png")}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset("vendor/index/aos/aos.css")}}" rel="stylesheet">
  <link href="{{asset("vendor/index/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("vendor/index/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
  <link href="{{asset("vendor/index/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
  <link href="{{asset("vendor/index/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
  <link href="{{asset("vendor/index/swiper/swiper-bundle.min.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("css/style.css")}}" rel="stylesheet">

   <!-- font awesome link-->
   <link rel="stylesheet" 
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
       crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- =======================================================
  * Template Name: Gp
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="#hero" class="logo me-auto me-lg-0 nav-link scrollto"><img src="{{asset("images/logo.png")}}" alt="" class="img-fluid"></a>
      
      <h1 class="logo me-auto me-lg-0  nav-link scrollto"><a href="#hero" class=" nav-link scrollto">Med Custodian</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0 ">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
         
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @if (auth()->check()) 

      <!-- dropdown -->

      <div class="dropdown">
        <a class="get-started-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person"></i> {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li><a class="dropdown-item" href="{{ROUTE('logout')}}">Logout</a></li>
        </ul>
      </div>      
       
        <!-- end dropdown -->
      @else
        <a href="{{ROUTE('login')}}" class="get-started-btn scrollto">Get Started</a>
      @endif
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Your Personal Medical History Hub</h1>
          <h2>At MedCustodian, we're dedicated to putting your health in your hands. With our user-friendly platform, you have the power to manage your medical history, prescriptions, test results, and more, all in one secure place.</h2>
        </div>
      </div>

      

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{asset("images/index/about.jpg")}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>📝 Comprehensive Medical History</h3>
            <p class="fst-italic">
              Say goodbye to scattered paper records and multiple apps.Here you can maintain a comprehensive digital medical history that includes medications, past diagnoses, treatments, and surgeries – organized and accessible whenever you need it.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Prescriptions and Tests: Keep track of your prescribed medications and recommended lab tests effortlessly. Receive timely reminders for refills and appointments, helping you stay on top of your health regimen.</li>
              <li><i class="ri-check-double-line"></i> User-Friendly Interface: Our intuitive interface is designed with you in mind. Whether you're tech-savvy or new to digital health management, MedCustodian is easy to navigate and use.</li>
              <li><i class="ri-check-double-line"></i> Anywhere, Anytime Access: Access your medical information from the comfort of your home or on the go. With our responsive design, you can use MedCustodian on your desktop, tablet, or smartphone.</li>
            </ul>
            <p>
              <a href="{{ROUTE('register')}}"><h4>Get Started Today</h4></a>

Join our growing community of empowered individuals who are taking control of their health journey.<a href="{{ROUTE('register')}}"> Sign up </a>now and start managing your medical history in a smarter, more efficient way. Your well-being matters, and MedCustodian is here to support you every step of the way.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

 

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

<div class="row">
<div class="section-title">
 
  <h3>Endeavors:</h3>
  <p><i>Striving to achieve excellence, the Patient History Management System aims to meet the following key objectives:</i></p>
</div>
  <div class="image col-lg-6" style='background-image: url("images/index/med history.jpg");' data-aos="fade-right"></div>
  <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
    <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
      <i class="bx bx-receipt"></i>
      <h4>Storing Records</h4>
      <p>To create a computerized information system for storing records.</p>
    </div>
    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
      <i class="bx bx-cube-alt"></i>
      <h4>Paper Less Work</h4>
      <p>To Lessen the amount of paper work.</p>
    </div>
    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
      <i class="bx bx-images"></i>
      <h4>Human Work</h4>
      <p>Lower the amount of human work required in the hospital.</p>
    </div>
    <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
      <i class="bx bx-shield"></i>
      <h4> Manage And Search Records</h4>
      <p>Provide end-users with the ability to manage and search records in a matter of seconds.</p>
    </div>
  </div>
</div>

</div>

    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
  
      <div class="container" data-aos="fade-up">

<div class="section-title">
  <h2>Services</h2>
  <h3>Our Services</h3>
  <p><i>Services that helps to manage the information related Your health care </i></p>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
    <div class="icon-box">
      <div class="icon"> <img src="images/index/doctors/cardiology.png" class="img-fluid" alt=""></div>
      <h4><a href="">Electronic Health Records (EHR) Management</a></h4>
      <p>We provide a secure platform for storing, accessing, and updating patient health records electronically. This includes medical history, diagnosis, treatment plans, medications, allergies, and test results.</p>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
    <div class="icon-box">
      <div class="icon"> <img src="images/index/doctors/prescp.jpg" class="img-fluid" alt=""></div>
      <h4><a href="">Medical Test</a></h4>
      <p>Physicians have the capability to prescribe tests to their patients, and the resulting reports can be uploaded either by the doctor or the patient themselves.</p>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
    <div class="icon-box">
      <div class="icon"><img src="images/index/doctors/pat portal.jpeg" class="img-fluid" alt=""></div>
      <h4><a href="">Patient Portal</a></h4>
      <p>We gives patients access regarding their health information, appointment history, test results, and allows them to communicate with their healthcare providers.</p>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
    <div class="icon-box">
      <div class="icon"><img src="images/index/doctors/health care.jpg" class="img-fluid" alt=""></div>
      <h4><a href="">Used By Different Healthcare Facilities </a></h4>
      <p>Our Website can be used in Different healthcare facilities such as clinics, hospitals etc.  </p>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
    <div class="icon-box">
      <div class="icon"><img src="images/index/doctors/wapp.png" class="img-fluid" alt=""></div>
      <h4><a href="">Send Prescription Plans</a></h4>
      <p>This system enables the seamless distribution of a doctor's prescription to patients through WhatsApp or email.</p>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
    <div class="icon-box">
      <div class="icon"><img src="images/index/doctors/treatment plan.jpeg" class="img-fluid" alt=""></div>
      <h4><a href="">Medication Plans</a></h4>
      <p>We Provide medication Plans to our Patients that how long will they take the given medicines according to their health condition. </p>
    </div>
  </div>

</div>

</div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Call To Action</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="#">Call To Action</a>
        </div>

      </div>
    </section>
    <!-- End Cta Section -->

     <!-- ======= why choose us Section ======= -->
     <section id="chhose us" class="choose us">

<div class="why-chooseus">
  <div class="main-choose">
    <div class="inner-chose">
    
</div>

<div class= "inner-chose">
  <h1>Why Choose Us?</h1>
  <div class="inner-chose-content">
    <div class="main-inner-choose">
    <div class="chose-icon">
    <i class="fa-solid fa-eye"></i>
</div>
  <div class="icon-content">
    <p>Our Vision is to make a community in which all people achieve their full potential for health and well-being across the lifespan.  We work to be trusted by patients, a valued partner in the community, and creators of positive change.</p>

</div>
</div>
<div class="main-inner-choose">
    <div class="chose-icon">
    <i class="fa-solid fa-bullseye"></i>
</div>
  <div class="icon-content">
    <p>Our mission is to serve the humanity and improve the lives of those we serve by making innovative and high-quality health and pharmacy services safe, affordable and easy to access.</p>

</div>
</div>
</div>
</div>
<!-- ============end why choose us================ -->
    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Check our Portfolio</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="images/index/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="images/index/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Portfolio Section -->

    <!-- ======= Counts Section ======= -->
    <!-- <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" data-aos="fade-right" data-aos-delay="100"></div>
          <div class="col-xl-7 ps-4 ps-lg-5 pe-4 pe-lg-1 d-flex align-items-stretch" data-aos="fade-left" data-aos-delay="100">
            <div class="content d-flex flex-column justify-content-center">
              <h3>Voluptatem dignissimos provident quasi</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="2" class="purecounter"></span>
                    <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="2" class="purecounter"></span>
                    <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock"></i>
                    <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="4" class="purecounter"></span>
                    <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate non vel</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="4" class="purecounter"></span>
                    <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                  </div>
                </div>
              </div>
            </div>  End .content-->
          <!-- </div>
        </div>

      </div>
    </section>End Counts Section --> 

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="images/index/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="images/index/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="images/index/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="images/index/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="images/index/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
            <!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>Meet our Expert Doctors</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="images/index/doctors/doctor.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr Zehra (Eye Specialist)</h4>
                <span><b>Dr Zehra is a highly skilled and dedicated ophthalmologist with a passion for providing exceptional eye care. Dr Zehra is a trusted specialist in diagnosing, treating, and managing a wide range of eye conditions. </b></span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="images/index/doctors/doctor1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr Masroor (Neurologist)</h4>
                <span><b>Dr Masroor, a distinguished neurologist who is dedicated to the intricate field of neurology. With a profound commitment to understanding and treating neurological disorders, Dr Neurologist brings a wealth of expertise and compassion to every aspect of patient care.</b></span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="images/index/doctors/doctor2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr Shakeel (Orthopedic)</h4>
                <span><b>Dr Shakeel a distinguished orthopedic surgeon who is dedicated to providing exceptional care in the realm of orthopedics. With a strong foundation in medical expertise and a commitment to improving musculoskeletal health, Dr Shakeel stands as a trusted specialist in diagnosing, treating, and rehabilitating a wide range of orthopedic conditions.</b></span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="images/index/doctors/doctor5.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr Iqra (Cardiologist)</h4>
                <span><b>Dr Iqra, an esteemed cardiologist who is dedicated to promoting cardiovascular health and wellness. With a profound commitment to patient care and a wealth of expertise in the field of cardiology, Dr iqra is a trusted specialist in diagnosing, treating, and managing a wide spectrum of heart-related conditions.</b></span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <!-- <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div> -->
        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="270" id="gmap_canvas" src="https://maps.google.com/maps?q=Aptech D - 4 Block H North Nazimabad II center  Town, Karachi, Karachi City, Sindh 74700, Pakistan &t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:270px;width:100%px;}</style><a href="https://embedgooglemap.2yu.co">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:270px;width:100%px;}</style></div></div>


        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>D - 4 Block H North Nazimabad Town, Karachi, Karachi City, Sindh 74700, Pakistan</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>medcustodian@mail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+92 321 2782593</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form method="post" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Med Custodian</h3>
              <p>
             <strong>Address:</strong> D - 4 Block H North Nazimabad Town, Karachi, Karachi City, Sindh 74700, Pakistan 
                <br><br>
                <strong>Phone:</strong> +92 321 2782593<br><br>
                <strong>Email:</strong> medcustodian@mail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#Services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>you will get an email from us</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Med Custodian</span></strong>. All Rights Reserved
      </div>
      {{-- <div class="credits"> --}}
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      {{-- </div> --}}
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->
  <script src="{{asset("vendor/index/aos/aos.js")}}"></script>
  <script src="{{asset("vendor/index/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("vendor/index/glightbox/js/glightbox.min.js")}}"></script>
  <script src="{{asset("vendor/index/isotope-layout/isotope.pkgd.min.js")}}"></script>
  <script src="{{asset("vendor/index/swiper/swiper-bundle.min.js")}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset("js/main.js")}}"></script>

</body>

</html>